<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/shop-v1/public/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/shop-v1/public/assets/img/laravel.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Laravel Shop v1</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link href="/shop-v1/public/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/shop-v1/public/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/shop-v1/public/assets/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <style>
    .container { 
        max-width: 2520px;
        margin: 10px;
    }
    </style>


</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="/shop-v1/public/admin" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="/shop-v1/public/assets/img/laravel.png">
          </div>
        </a>
        <a href="/shop-v1/public/admin" class="simple-text logo-normal">
          Laravel Shop v1
          <!-- <div class="logo-image-big">
            <img src="/shop-v1/public/assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

            <li>
                <a href="{{ route('admin.products.list') }}">
                <i class="fab fa-product-hunt"></i>
                <p>Products</p>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.subscribes') }}">
                <i class="fas fa-at"></i>
                <p>Subscribers</p>
                </a>
            </li>

            <li>
                <a href="{{ route('countries.list') }}">
                <i class="fas fa-globe"></i>
                <p>Countries</p>
                </a>
            </li>

            <li>
                <a href="{{ route('regions.list') }}">
                <i class="fas fa-globe"></i>
                <p>Regions</p>
                </a>
            </li>  

            <li>
                <a href="{{ route('socials.list') }}">
                <i class="fas fa-share-alt"></i>
                <p>Socials</p>
                </a>
            </li>  

            <li>
                <a href="{{ route('socials.platforms.list') }}">
                <i class="fas fa-users"></i>
                <p>Social Platforms</p>
                </a>
            </li>  

        </ul>

        <hr>
        <ul class="mt-5 mb-4">                
            <form method="post" class="form-inline" action="{{ route('admin.import.ebay') }}">
                @csrf    
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Keyword ...">
                <button class="btn btn-success" type="submit">Import from Ebay</button>
            </form>        
        </ul>
        <hr>

        <ul class="nav">
    
            <li>
                <a href="/shop-v1/public/admin">
                <i class="far fa-user-circle"></i>
                <p>Admin</p>
                </a>
            </li>

            <li class="mb-5">
                <a href="/shop-v1/public">
                <i class="fas fa-user-circle"></i>
                <p>Public</p>
                </a>
            </li>    

        </ul>

        <hr>
        <ul class="mt-5 mb-4">                
            <div class="text-center text-warning pr-5">
                {{ (microtime(true) - LARAVEL_START) }} sec
            </div>      
        </ul>
        <hr>


        

      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        
        <div class="container mt-4">
            @yield('content')       
        </div>  
        
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script> Laravel Shop v1              

              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
    <!--   Core JS Files   -->
    <script src="/shop-v1/public/assets/js/core/jquery.min.js"></script>
    <script src="/shop-v1/public/assets/js/core/popper.min.js"></script>
    <script src="/shop-v1/public/assets/js/core/bootstrap.min.js"></script>
    <script src="/shop-v1/public/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="/shop-v1/public/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/shop-v1/public/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/shop-v1/public/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="/shop-v1/public/assets/demo/demo.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in /shop-v1/public/assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );            
    </script>

</body>

</html>
