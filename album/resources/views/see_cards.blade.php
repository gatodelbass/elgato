@extends('layouts.app')

@section('content')

<script src="https://kit.fontawesome.com/36ee4399de.js" crossorigin="anonymous"></script>


<div class="container">
    <div class="row justify-content-center">

        <div>
            <h2><a href="{{ URL::route('home') }}">Back to home</a></h2>
        </div>

        <div class="col-md-12">

            @foreach ($all_cards->chunk(6) as $cards)
                <div class="row">
                    @foreach ($cards as $card)

                    <div class="card" style="width: 10rem;">
                        <p class="mx-auto">
                            @for ($i = 1; $i <= $card->rarity; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </p>
                        <img src="{{ url('storage/images/'.$card->img_route) }}" class="card-img-top" alt="..." >
                                                    
                        <p class="justify" >
                            {{$card->name}}
                            <br>                            
                            <span class="badge badge-pill badge-warning">{{$card->cost}} Oros</span>                        
                        </p>                                
                        
                    </div>

              
                    @endforeach

                </div>

            @endforeach
                
        </div>
       
    </div>
</div>
@endsection
