@extends('layouts.app')
@section('title', 'Social Accounts List')

@section('content')
    <div class="container">

        <table class="table table-hover table-striped table-bordered">
            
            @php($i = 0)

            @foreach ($var as $social)

                <tr> 
                    @foreach ($social as $name => $value)

                        @if ($i == 0)                        
                            <td> {{ $name }} </td>                           
                        @endif                      
                        
                    @endforeach
                </tr> 

                <tr>                        
                    @foreach ($social as $name => $value)
                        <td> {{ $value }} </td>
                    @endforeach

                    <td><a href="edit/{{ $social['id'] }}">EDIT</a></td>
                    <td><a href="delete/{{ $social['id'] }}">DELETE</a></td>

                </tr>

                @php($i++)

            @endforeach
      
        </table>

    </div>
@endsection