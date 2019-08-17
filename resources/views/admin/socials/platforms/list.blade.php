@extends('admin.dashboard')
@section('title', 'Social Platforms List')

@section('content')

    <h2 class="text-center"><a href="{{ route('socials.platforms.new') }}">Add New Social Platforms</a> </h2>

    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>              
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>                 
            </tr>
        </thead>
        
        <tbody>
            
            @foreach ($details as $detail)
                <tr>  
                    @foreach ($detail as $name => $value)    
                                    
                        @if ($name == 'image')
                            <td><img src="{{ $value }}" style="height: 40px"> </td>                      
                        @else
                            <td>{{ $value }} </td>
                        @endif

                    @endforeach 

                    <td><a href="edit/{{ $detail['id'] }}">EDIT</a></td>
                    <td><a href="delete/{{ $detail['id'] }}">DELETE</a></td>
                    
                </tr>
            @endforeach 
        
        </tbody>
        
        <tfoot>
            <tr>
                <th>ID</th>
                <th>NAME</th>           
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>     
            </tr>
        </tfoot>
    </table>

@endsection