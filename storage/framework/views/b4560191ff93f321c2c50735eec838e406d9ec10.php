<!doctype html>
<html>
<head>
<title><?php echo $__env->yieldContent('title'); ?></title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
  body { 
    padding-top: 80px!important; 
    padding-bottom: 80px; 
  }
</style>
</head>
<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-info mb-5 mt-1 fixed-top">

      <!-- Brand -->
      <a class="navbar-brand" href="/shop-v1/public/">
        <img src="http://icons.iconarchive.com/icons/designbolts/seo/256/Market-Analysis-icon.png" style="height: 32px;">
      </a>
    
      <!-- Links -->
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link" href="/shop-v1/public/">Home</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Social Accounts</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo e(route('admin.products.list')); ?>">NEW11</a>
              <a class="dropdown-item" href="">LIST</a>
            </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Social Platforms</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/shop-v1/public/socials/platforms/new">NEW</a>
              <a class="dropdown-item" href="/shop-v1/public/socials/platforms/list">LIST</a>
            </div>
        </li>  

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Product</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/shop-v1/public/products/list">LIST</a>
              <a class="dropdown-item" href="/shop-v1/public/import/AliExpress">Import from AliExpress</a>
              
            </div>
        </li> 
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Region</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/shop-v1/public/listregion/countries">Country List</a>
              <a class="dropdown-item" href="/shop-v1/public/listregion/regions">Region List</a>
              <a class="dropdown-item" href="/shop-v1/public/listregion/cities">City List</a>
              <a class="dropdown-item" href="/shop-v1/public/import/regions/5">Import</a>
            </div>
        </li> 
      </ul>

      <ul class="ml-auto mb-1">
        
          <form method="post" class="form-inline" action="/shop-v1/public/import/Ebay">
            <?php echo e(csrf_field()); ?>


            <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search Term">
            <button class="btn btn-success" type="submit">Import from Ebay</button>
          </form>

      </ul>

      

    </nav>

  
  <!-- navigation bar ends here -->


  <?php echo $__env->yieldContent('content'); ?>



  <!-- Footer -->
  <footer class="page-footer bg-info mb-1 mt-3 p-1 fixed-bottom">
    <div class="text-center text-warning">
            <?php echo e((microtime(true) - LARAVEL_START)); ?> sec
    </div>
  </footer>
    <!-- Footer -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html><?php /**PATH D:\SERVER\shop-v1\resources\views/layouts/nav-admin.blade.php ENDPATH**/ ?>