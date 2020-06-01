@extends('layouts.app')

@section('content')

<script src="https://kit.fontawesome.com/36ee4399de.js" crossorigin="anonymous"></script>


<div class="container">
    <div class="row justify-content-center">

        <div>
            <h2><a href="{{ URL::route('home') }}">Back to home</a></h2>
        </div>

        <div class="col-md-12">

            @foreach ($my_cards->chunk(6) as $cards)
                <div class="row">
                    @foreach ($cards as $my_card)

                    <div class="card" style="width: 10rem;">
                        <p class="mx-auto">
                            @for ($i = 1; $i <= $my_card->rarity; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </p>
                        <img src="{{ url('storage/images/'.$my_card->img_route) }}" class="card-img-top" alt="..." >
                                                    
                        <p class="justify" >
                            {{$my_card->name}}
                            <br>                            
                            <span class="badge badge-pill badge-warning">{{$my_card->cost}} Oros</span>
                            <br>
                            <a href="{{ URL::route('trade', $my_card->id) }}">Trade!</a>
                        </p>                                
                        
                    </div>

              
                    @endforeach

                </div>

            @endforeach
                
        </div>
       
    </div>
</div>
@endsection
