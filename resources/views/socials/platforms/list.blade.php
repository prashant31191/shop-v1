@extends('layouts.app')
@section('title', 'Social Platforms List')

@section('content')
    <div class="container">

        <table class="table table-hover table-striped table-bordered">
            
            {{ $i = 0 }}

            @foreach ($social_platforms as $social_platform)

                <tr> 
                    @foreach ($social_platform as $name => $value)

                        @if ($i == 0)                        
                            <td> {{ $name }} </td>                           
                        @endif                      
                        
                    @endforeach
                </tr> 

                <tr>                        
                    @foreach ($social_platform as $name => $value)
                        <td> {{ $value }} </td>
                    @endforeach

                    <td><a href="edit/{{ $social_platform['id'] }}">EDIT</a></td>
                    <td><a href="delete/{{ $social_platform['id'] }}">DELETE</a></td>

                </tr>

                {{ $i++ }}
            @endforeach
      
        </table>

    </div>
@endsection