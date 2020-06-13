@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div>

                    </div>

                    <div>
                        <h2><a href="{{ URL::route('create_card') }}">Create new card</a></h2>
                    </div>
                    <div>
                        <h2><a href="{{ URL::route('see_cards') }}">See All Cards</a></h2>
                    </div>

                    <div>
                        <h2><a href="{{ URL::route('try') }}">Get a card for me!</a></h2>
                    </div>

                    <div>
                        <h2><a href="{{ URL::route('my_cards') }}">See My Cards</a></h2>
                    </div>

                    <div>   
                        <p class="yellow">sdfsfsf</p>


                        <h1>Example heading <span class="badge badge-info">New</span></h1>

                    </div>

                    <span class="badge badge-primary">Primary</span>
<span class="badge badge-secondary">Secondary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-danger">Danger</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-info">Info</span>
<span class="badge badge-light">Light</span>
<span class="badge badge-dark">Dark</span>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
