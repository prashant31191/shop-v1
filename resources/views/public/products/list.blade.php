@extends('public.dashboard')
@section('title', 'Product List')

@section('content')

    <h2 class="text-center">Total: {{ count($products) }} products found</h2>
    <div class="row mt-5 mb-5">

        @foreach ($products as $detail)
            <div class="col-md-3 col-sm-6">

                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="{{ $detail['image'] }}">
                        </a>                    
                    </div>
                
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{ $detail['name'] }}</a></h3>
                        <div class="price">$16.00
                            <span>$20.00</span>
                        </div>
                        <a class="add-to-cart" href="">+ Add To Cart</a>
                    </div>
                </div>
            </div>

        @endforeach    

    </div>

@endsection


@section('sidebar')

    <div class="m-3 p-3 text-center mb-5 border border-danger rounded bg-secondary">
        <h2>Newsletter Subscribe</h2>
        
        <form method="POST" action="{{ route('subscribers.store') }}">
            @csrf

            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
        
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1"> Agree with our SPAM TERM </label>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>

    <hr>

    <div id="accordion">  
        
        {{-- {{ dd($all_categories) }} --}}
        {{-- {{ dd($categories) }} --}}

        @foreach($categories as $category)

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#category{{ $category->id }}">{{ $category->name }} </a>
                </div>
                <div id="category{{ $category->id }}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                            @if(count($category->children))
                            @include('public.subcategories', ['children' => $category->children])
                        @endif
                    </div>
                </div>
            </div>           
           
        @endforeach
        
    </div>

@endsection