@extends('layouts.app')
@section('title', 'Social Platforms List')

@section('content')
    <div class="container">
        

        <h2>Add New Social Platform </h2>
            
        <form method="post" name="update" action="save">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="usr">Platform Name:</label>
                <input type="text" class="form-control" name="name">
            </div>                           
                
            <hr>

            <div class="w-90 container clearfix text-center">
                <button type="submit" class="pl-4 pr-4 btn-lg btn-primary float-left" name="submit" value="good">SAVE</button>
            </div>              

        </form>	
    </div>
@endsection
            
