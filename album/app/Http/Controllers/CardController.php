<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Card;
use App\Models\UserCard;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $all_cards = Card::all();
        return view('see_cards')
                ->with('all_cards', $all_cards);
    }


    public function my_cards()
    {
        $user_id = Auth::id();      

        $my_cards = DB::table('user_cards')
            ->select('user_cards.id', 'user_cards.status', 'cards.name', 'cards.img_route', 'cards.rarity', 'cards.cost')
            ->join('cards', 'user_cards.card_id', '=', 'cards.id')
            ->where('user_cards.user_id', '=', $user_id)
            ->orderBy('rarity', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('my_cards')
                ->with('my_cards', $my_cards);
    }


    public function create()
    {   
        Log::debug("the justice");
        return view('create_card');
    }

    public function try()
    {   
        //Log::debug("try");

        $rarity = $this->getRandomWeightedElement();

        Log::debug($rarity);

        $user_id = Auth::id();
        $random_card = Card::all()->where('rarity', '=', $rarity)->random();

        $user_card = new UserCard;
        $user_card->user_id = $user_id;
        $user_card->card_id = $random_card->id;
        $user_card->status = "unlocked";
        $user_card->save();

        return view('try')
                ->with('random_card', $random_card);
    }

    public function trade($card_id)
    {   
        Log::debug("trade " . $card_id);

        

        
    }






    public function save(Request $request)
    {

        $now = Carbon\Carbon::now();
        $now->toDateTimeString();

        $card = new Card;
        $card->name = $request->card_name;
        $card->cost = $request->card_cost;
        $card->rarity = $request->input('rarity');
        $card->img_route = $request->card_name . "_" . $now->format('Y-m-d') ."." . $request->image->extension(); 
        $card->save(); 

        Log::debug($request->image->extension());    

        $request->image->storeAs('public/images/cards', $request->card_name . "_" . $now->format('Y-m-d') . "." . $request->image->extension());

        //return view('create_card');
    }

    /**
   * getRandomWeightedElement()
   * Utility function for getting random values with weighting.
   * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
   * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
   * The return value is the array key, A, B, or C in this case.  Note that the values assigned
   * do not have to be percentages.  The values are simply relative to each other.  If one value
   * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
   * chance of being selected.  Also note that weights should be integers.
   * 
   * @param array $weightedValues
   */
  function getRandomWeightedElement() {

    $weights = array("1"=>"58", "2"=>"25", "3"=>"10", "4"=>"5", "5"=>"2");
    $rand = mt_rand(1, (int) array_sum($weights));
    foreach ($weights as $key => $value) {
      $rand -= $value;
      if ($rand <= 0) {
        return $key;
      }
    }
  }



}
