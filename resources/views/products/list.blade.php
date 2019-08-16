@extends('layouts.app')
@section('title', 'Product List')

@section('content')
    <div class="container">

        <table class="table table-hover table-striped table-bordered">
            
            @php($i = 0)

            @foreach ($var as $product)

                <tr> 
                    @foreach ($product as $name => $value)

                        @if ($i == 0)                        
                            <td> {{ $name }} </td>                           
                        @endif                      
                        
                    @endforeach
                </tr> 

                <tr>                        
                    @foreach ($product as $name => $value)                       
                        @if ($name == 'image')
                            <td><img src="{{ $value }}" style="height: 50px"> </td>                      
                        @else
                            <td>{{ $value }} </td>
                        @endif
                    @endforeach

                    <td><a href="edit/{{ $product['id'] }}">EDIT</a></td>
                    <td><a href="delete/{{ $product['id'] }}">DELETE</a></td>

                </tr>

                @php($i++)
                
            @endforeach
      
        </table>

    </div>
@endsection