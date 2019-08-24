@extends('public.dashboard')
@section('title', 'Catalog')

@section('content')

    <div class="row">
        
                {{-- {{ dd($products) }} --}}

        @foreach ($products as $detail)
            <div class="col-md-3 col-sm-6 border p-2 bg-muted">       

                <div style="height:150px;" class="text-center position-relative">
                    <img class="p-2 h-100" src="{{ $detail['image'] }}">
                </div>
                                            
                <p><a href="#">{{ $detail['name'] }}</a></p>
                <div class="price">${{ $detail->prices[0]->value }}</div>
                        
            </div>

        @endforeach    

    </div>

    <hr>
    {{-- {{ dd($products) }}} --}}

    <div class="d-flex justify-content-center">
        {{-- {{ $products->concat(
            [
                'per_page' => $items_per_page,               
            ]
        )->links() }} --}}

        {{-- {{ $products->links() }} --}}

    </div>

@endsection


@section('sidebar')

    <div class="dropdown d-inline"> 
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Sort by Price
        </button> 
        <div class="dropdown-menu">
            <a class="dropdown-item" href="http://localhost/shop-v1/public/catalog/price/cheap">cheap</a>
            <a class="dropdown-item" href="http://localhost/shop-v1/public/catalog/price/expensive">expensive</a>
        </div>
    </div>

    <div class="dropdown d-inline"> 
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Sort by Date
        </button> 
        <div class="dropdown-menu">
            <a class="dropdown-item" href="http://localhost/shop-v1/public/catalog/date/fresh">fresh</a>
            <a class="dropdown-item" href="http://localhost/shop-v1/public/catalog/date/old">old</a>
        </div>
    </div>

    <hr>

    <div class="m-1 p-3 text-center border border-primary rounded">
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

        @foreach($categories as $category)

            <div class="card m-3">
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