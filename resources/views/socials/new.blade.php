@extends('layouts.app')
@section('title', 'Social Accounts List')

@section('content')
    <div class="container">
        
        {{-- {{ dd($social_platforms) }} --}}

        <h2>Add New Social Accounts </h2>
            
        <form method="post" name="update" action="save">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="usr">Platform Name:</label>
                <input type="text" class="form-control" name="name">
            </div> 

            <div class="form-group">
                <label>Select Social Platform</label>
                <select class="form-control" name="social_platform_id">                          
                    @foreach ($social_platforms as $key => $value)
                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>   

            <div class="form-group">
                <label>Select Contact Data </label>
                <select class="form-control" name="contact_data_id">                          
                    
                        <option value="1">1</option>
                </select>
            </div> 
            <hr>

            <div class="w-90 container clearfix text-center">
                <button type="submit" class="pl-4 pr-4 btn-lg btn-primary float-left" name="submit" value="good">SAVE</button>
            </div>  

        </form>	
    </div>
@endsection
            
