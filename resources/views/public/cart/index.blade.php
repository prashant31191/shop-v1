@extends('public.app')
@section('title', 'Cart Items List')

@section('content')

    {{-- <h2 class="text-center">Total: {{ count($cart_items) }} unique products</h2> --}}

    {{-- {{ dd($cart_items) }} --}}

        <div class="pb-1">
            <div class="container">
                <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
        
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                        
                                <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Product</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remove</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                    $i = 0;
                                @endphp

                                @foreach ($cart_items as $detail)
                                
                                @php
                                    $total += $detail->itemPrice->value*$detail['amount'];
                                    $i++;
                                @endphp

                                    <tr>
                                        <th scope="row" class="border-0">
                                            
                                        <div class="p-2">
                                            <div class="ml-3 mr-4 d-inline-block align-middle">
                                                <h2> <a href="#" class="text-dark d-inline-block align-middle">{{ $i }}. </a></h2>
                                            </div>

                                            <img src="{{ $detail->product->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $detail->product->name }}</a></h5>
                                                <span class="text-muted font-weight-normal font-italic d-block">{{ $detail->product->description }}</span>
                                            </div>
                                        </div>
                                        </th>
                                        {{-- <td class="border-0 align-middle"><strong>${{ $detail->prices[0]['value'] }}</strong></td> --}}
                                        <td class="border-0 align-middle"><strong>${{ $detail->itemPrice->value }}</strong></td>

                                        <td class="border-0 align-middle">
                                            <a href="{{ route('cart.minus', $detail->id) }}" class="text-dark"><i class="far fa-minus-square p-2"></i></a>
                                            <strong> {{ $detail['amount'] }} </strong>
                                            <a href="{{ route('cart.plus', $detail->id) }}" class="text-dark"><i class="far fa-plus-square p-2"></i></a>
                                        </td>
                                        <td class="border-0 align-middle"><a href="{{ route('cart.remove', $detail->id) }}" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                
                                @endforeach    

                            </tbody>
                        </table>
                        <hr>
                        <h3 class="text-right text-danger pr-5">Total Price: ${{ $total }}</h3>
                    </div>
                    <!-- End -->
                </div>
            </div>
      
      
          </div>
        </div>

@endsection
