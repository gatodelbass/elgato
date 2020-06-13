<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Trade;
use App\Models\Card;
use App\Models\UserCard;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TradeController extends Controller
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

        $trades = Trade::all();

        
        return view('see_my_trades')
                ->with('trades', $trades);
    }


    public function post_card()
    {

        Log::debug("post card trade");

        $user_id = Auth::id();
        $trade = new Trade;
        $trade->user_card_posted = $user_id;
        $trade->old_owner = $user_id;
        $trade->status = "unlocked";
        $trade->save();



        


    }


   



}
