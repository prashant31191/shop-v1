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

    <style>
    body { 
        padding-top: 70px; 
        padding-bottom: 70px;
    }
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
                        <a class="dropdown-item" href="{{ route('subscribe') }}">Create New</a>
                    </div>
                </li>       
        

            </ul>
        
            <ul class="ml-auto mb-1">                
                <form method="post" class="form-inline" action="{{ route('admin.import.ebay') }}">
                    {{ csrf_field() }}
        
                    <input class="form-control mr-sm-2" type="text" name="query" placeholder="Keyword ...">
                    <button class="btn btn-success" type="submit">Import from Ebay</button>
                </form>        
            </ul>
        
        </nav>        
        
        <!-- navigation bar ends here -->      
        <div class="container">
            @yield('content')       
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