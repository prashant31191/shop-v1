@extends('public.dashboard')
@section('title', 'Categories List')


@section('sidebar')

    <div id="accordion">  
        
        @foreach($categories as $category)

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#category{{ $category->id }}">{{ $category->name }} ({{ count($all_categories) }})</a>
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

@section('content')
    <h2>Demo Page Preview</h2>
@endsection