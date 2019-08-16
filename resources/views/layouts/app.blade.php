<!doctype html>
<html>
<head>
<title>@yield('title')</title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

    <!-- navigation bar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info mb-5 mt-3">

        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img src="http://icons.iconarchive.com/icons/designbolts/seo/256/Market-Analysis-icon.png" style="height: 32px;">
        </a>
      
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="/shop-v1-laravel/public/">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Social Accounts</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/shop-v1-laravel/public/socials/new">NEW</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/socials/list">LIST</a>
              </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Social Platforms</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/shop-v1-laravel/public/socials/platforms/new">NEW</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/socials/platforms/list">LIST</a>
              </div>
          </li>  

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Product</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/shop-v1-laravel/public/products/list">LIST</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/import/AliExpress">Import from AliExpress</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/import/Ebay">Import from Ebay</a>
              </div>
          </li> 
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Region</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/shop-v1-laravel/public/listregion/countries">Country List</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/listregion/regions">Region List</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/listregion/cities">City List</a>
                <a class="dropdown-item" href="/shop-v1-laravel/public/import/regions/5">Import</a>
              </div>
          </li> 

        </ul>

        {{-- <span class="navbar-text text-warning">
            {{ (microtime(true) - LARAVEL_START) }} sec
        </span> --}}

        </nav>

    </div>
  <!-- navigation bar ends here -->


  @yield('content')


  <!-- Footer -->
  <footer class="page-footer bg-info mt-4 p-2 fixed-bottom">
    <div class="text-center text-warning">
            {{ (microtime(true) - LARAVEL_START) }} sec
    </div>
  </footer>
    <!-- Footer -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>