<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style>
    body { 
        background-color: #f4f4f4;
    }
    .container {
        max-width: 1400px;
        margin: auto;
    }

    .price {
        text-align: center;
        position: absolute;
        left: 5px;
        top: 5px;
        color: red;
        width: 60px;
        height: 23px;
        font-size: 14px;
        line-height: 14x;
        background-color: #dddddd;
        border: 1px solid #000;
        border-radius: 10px;
    }
    </style>

    <title>@yield('title')</title>

</head>

    <body>

        {{-- {{ dd($categories) }} --}}

        <nav class="container navbar navbar-expand-lg navbar-dark bg-primary mb-3 mt-2">

            <!-- Brand -->
            <a class="navbar-brand" href="/shop-v1/public/admin">
                <img src="http://icons.iconarchive.com/icons/designbolts/seo/256/Market-Analysis-icon.png" style="height: 32px;">
            </a>
            
            <!-- Links -->
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="/shop-v1/public">Home</a>
                </li>        
        
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Subscribe</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('subscribers.create') }}">create</a>
                        <a class="dropdown-item" href="{{ route('subscribers.index') }}">index</a>
                    </div>
                </li>       
        
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Products</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('products.index') }}">index</a>
                    </div>
                </li>   

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Catalog</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('public.catalog') }}">index</a>
                    </div>
                </li>     
            </ul>      
            
            <ul class="m-auto mb-1">                
                {{-- <span>Public Dashboard </span> --}}
            </ul>

            <div class="text-center text-warning pr-5">
                              
                <span> {{ $cart->total_price->first()->value }}</span>
                <span> {{ $cart->total_price->first()->currency->name }}</span>
            </div>

        </nav>     

        <div class="container">
            <div class="row">

                <div class= "col-9">
                    @yield('content')   
                </div> 

                <div class="col-3">
                     @yield('sidebar')           
                </div>

            </div>
        </div>


        <!-- Footer -->
        <footer class="container page-footer bg-primary mb-1 mt-3 p-1 navbar navbar-expand-lg navbar-dark">

            <ul class="navbar-nav pl-5">
        
                <li class="nav-item">
                    <a class="nav-link" href="/shop-v1/public/admin">Admin</a>
                </li>        
        
            </ul>
        
            <ul class="m-auto mb-1">                
                <span>@2019 Copyright </span>
            </ul>
                
            <div class="text-center text-warning pr-5">
                    {{ (microtime(true) - LARAVEL_START) }} sec
            </div>
        </footer>
            <!-- Footer -->
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );            
        </script>

  </body>
</html>