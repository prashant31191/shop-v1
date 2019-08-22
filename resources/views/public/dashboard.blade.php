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
        padding-top: 70px; 
        padding-bottom: 70px;
    }
    .container {
        max-width: 2520px;
        margin: 20px;
    }

    /********************* shopping Demo-1 **********************/
    .product-grid{font-family:Raleway,sans-serif;text-align:center;padding:0 0 72px;border:1px solid rgba(0,0,0,.1);overflow:hidden;position:relative;z-index:1}
    .product-grid .product-image{position:relative;transition:all .3s ease 0s}
    .product-grid .product-image a{display:block}
    .product-grid .product-image img{width:auto;height:200px}
    .product-grid .pic-1{opacity:1;transition:all .3s ease-out 0s}
    .product-grid:hover .pic-1{opacity:1}
    .product-grid .product-content{background-color:#fff;text-align:center;padding:12px 0;margin:0 auto;position:absolute;left:0;right:0;bottom:-27px;z-index:1;transition:all .3s}
    .product-grid:hover .product-content{bottom:0}
    .product-grid .title{font-size:13px;font-weight:400;letter-spacing:.5px;text-transform:capitalize;margin:0 0 10px;transition:all .3s ease 0s}
    .product-grid .title a{color:#828282}
    .product-grid .title a:hover,.product-grid:hover .title a{color:#ef5777}
    .product-grid .price{color:#333;font-size:17px;font-family:Montserrat,sans-serif;font-weight:700;letter-spacing:.6px;margin-bottom:8px;text-align:center;transition:all .3s}
    .product-grid .price span{color:#999;font-size:13px;font-weight:400;text-decoration:line-through;margin-left:3px;display:inline-block}
    .product-grid .add-to-cart{color:#000;font-size:13px;font-weight:600}

    
    </style>

    <title>@yield('title')</title>

</head>

  <body>




        <nav class="navbar navbar-expand-lg navbar-dark bg-info mb-5 mt-1 fixed-top">

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
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('categories.index') }}">index</a>
                    </div>
                </li>     
            </ul>
        

        
        </nav>        
        

        <div class="container">
            <div class="row">

                <div class= "col-8">
                    @yield('content')   
                </div> 

                <div class="col-3">
                     @yield('sidebar')           
                </div>

            </div>
        </div>


        <!-- Footer -->
        <footer class="page-footer bg-info mb-1 mt-3 p-1 fixed-bottom navbar navbar-expand-lg navbar-dark">

            <ul class="navbar-nav pl-5">
        
                <li class="nav-item">
                    <a class="nav-link" href="/shop-v1/public/admin">Admin</a>
                </li>        
        
                <li class="nav-item">
                    <a class="nav-link" href="/shop-v1/public">Public</a>
                </li>    

                <li class="nav-item">
                    <a class="nav-link" href="/shop-v1/public/profile">Profile</a>
                </li> 
        
            </ul>
        
            <ul class="m-auto mb-1">                
                <span>Public Dashboard</span>
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