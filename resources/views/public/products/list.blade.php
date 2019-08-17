@extends('public.dashboard')
@section('title', 'Product List')

@section('content')

    <h2 class="text-center">Total: {{ count($details) }} products found</h2>

    <div class="row">

        @foreach ($details as $detail)    
                            
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ $detail['image'] }}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="#">{{ $detail['name'] }}</a>
                    </h4>
                    <h5>$</h5>
                    <p class="card-text">{{ $detail['description'] }}</p>
                </div>
                
                </div>
            </div>

        @endforeach        
    </div>

@endsection