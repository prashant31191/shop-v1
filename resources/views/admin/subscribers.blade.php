@extends('admin.dashboard')
@section('title', 'Subscribers List')

@section('content')

    <h2 class="text-center"><a href="{{ route('admin.import.emails') }}">Generate Subscribers(100) </a> </h2>

    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>CONTACT DATA ID</th>
                <th>EMAIL</th>
                <th>STATUS</th>
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
                <th>CONTACT DATA ID</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>     
            </tr>
        </tfoot>
    </table>

@endsection