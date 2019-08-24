@extends('admin.dashboard')
@section('title', 'Categoris List')

@section('content')


    <h2 class="text-center"><a href="{{ route('admin.import.ebayCategories') }}">Import Category </a> </h2>
    <h3 class="text-center"><a href="{{ route('admin.import.ebaySubCategories') }}">Import SubCategory </a> </h3>
    <h4 class="text-center"><a href="{{ route('admin.import.ebaySubSubCategories') }}">Import SubSubCategory </a> </h4>


    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>category_id</th>
                <th>name</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>                 
            </tr>
        </thead>
        
        <tbody>
            
            {{-- {{ dd($categories) }} --}}
            @foreach ($categories as $detail)
                <tr>                 
                            
                    <td>{{ $detail['id'] }}</td>
                    <td>{{ $detail['category_id'] }}</td>
                    <td>{{ $detail['name'] }}</td>                  
                    <td>{{ $detail['created_at'] }}</td>                  
                    <td>{{ $detail['updated_at'] }}</td>                  

                    <td><a href="edit/{{ $detail['id'] }}">EDIT</a></td>
                    <td><a href="delete/{{ $detail['id'] }}">DELETE</a></td>
                    
                </tr>
            @endforeach 
        
        </tbody>
        
        <tfoot>
            <tr>
                <th>id</th>
                <th>category_id</th>
                <th>name</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>     
            </tr>
        </tfoot>
    </table>


@endsection