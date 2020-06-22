@extends('layouts.app')

@section('content')

<script src="https://kit.fontawesome.com/36ee4399de.js" crossorigin="anonymous"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div>
                <h2><a href="{{ URL::route('home') }}">Back to home</a></h2>
            </div>        
            <div class="card" style="width: 10rem;">                
                <p class="mx-auto">
                    @for ($i = 1; $i <= $random_card->rarity; $i++)
                        <i class="far fa-star"></i>
                    @endfor
                </p>
                <img src="{{ url('storage/images/cards/'.$random_card->img_route) }}" class="card-img-top" alt="..." >
                                            
                <p class="justify" >
                    {{$random_card->name}}
                    <br>                            
                    <span class="badge badge-pill badge-warning">{{$random_card->cost}} Oros</span>                        
                </p>                                
                
            </div>
           
        </div>
    </div>
</div>
@endsection
