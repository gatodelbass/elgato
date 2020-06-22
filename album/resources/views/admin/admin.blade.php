@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <h2><a href="{{ URL::route('create_card') }}">Create new card</a></h2>
                    </div>
                    <div>
                        <h2><a href="{{ URL::route('see_cards') }}">See All Cards</a></h2>
                    </div>                   
                    <div>
                        <h3>Ayudas para codificar</h3>
                        <hr>
                        <h3>Esquema de colores:</h3>
                        <span class="badge badge-primary">Primary</span>
                        <span class="badge badge-secondary">Secondary</span>
                        <span class="badge badge-success">Success</span>
                        <span class="badge badge-danger">Danger</span>
                        <span class="badge badge-warning">Warning</span>
                        <span class="badge badge-info">Info</span>
                        <span class="badge badge-light">Light</span>
                        <span class="badge badge-dark">Dark</span>
                        <h3>tamaño de las imagenes:</h3>
                        <p>400 de alto x 260 de ancho para full image</p>
                        <img src="{{ url('storage/images/other/sample.png') }}" alt="Sample" width="260" height="400">
                        <p>240 de alto x 156 de ancho para mas pequeña</p>
                        <img src="{{ url('storage/images/other/sample.png') }}" alt="Sample" width="156" height="240">
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
