@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h2><a href="{{ URL::route('home') }}">Back to home</a></h2>
            </div>

            
            <div class="card">

                <div class="card-header">Create Card</div>

               here form

               <form action="submit_create_card" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="card_name" placeholder="Card Name" class="form-control">
                <br>
                <input type="number" name="card_cost" placeholder="Card Cost" class="form-control">
                <br>
                <select name="rarity" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>


                <input type="file" name="image" id="image" class="form-control" required>
                <br>


                <button type="submit">Create Card</button>
                   
               </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
