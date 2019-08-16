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

    <title><?php echo $__env->yieldContent('title'); ?></title>

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
                    <a class="nav-link" href="/shop-v1/public/admin">Home</a>
                </li>
        
        
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Social</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('socials.new')); ?>">Create New</a>
                        <a class="dropdown-item" href="<?php echo e(route('socials.list')); ?>">List All</a>
                    </div>
                </li>
        
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Platforms</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('socials.platforms.new')); ?>">Create New</a>
                        <a class="dropdown-item" href="<?php echo e(route('socials.platforms.list')); ?>">List All</a>
                    </div>
                </li>  
        
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Product</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('admin.products.list')); ?>">List All</a>
                        <a class="dropdown-item" href="<?php echo e(route('admin.import.aliexpress')); ?>">Import from AliExpress</a>
                    </div>
                </li> 
                
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Region</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('countries.list')); ?>">Country List</a>
                        <a class="dropdown-item" href="<?php echo e(route('regions.list')); ?>">Region List</a>
                        <a class="dropdown-item" href="<?php echo e(route('admin.import.regions')); ?>">Import</a>
                    </div>
                </li> 

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Subscribers</a>
                    <div class="dropdown-menu">                   
                        <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>">List All</a>
                        <a class="dropdown-item" href="<?php echo e(route('admin.import.emails')); ?>">Import Random</a>
                    </div>
                </li> 

            </ul>
        
            <ul class="m-auto mb-1">                
                <span>Admin Dashboard</span>
            </ul>

            <ul class="ml-auto mb-1">                
                <form method="post" class="form-inline" action="<?php echo e(route('admin.import.ebay')); ?>">
                    <?php echo e(csrf_field()); ?>

        
                    <input class="form-control mr-sm-2" type="text" name="query" placeholder="Keyword ...">
                    <button class="btn btn-success" type="submit">Import from Ebay</button>
                </form>        
            </ul>
        
        </nav>        
        
        <!-- navigation bar ends here -->      
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>       
        </div>
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

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );            
        </script>

  </body>
</html><?php /**PATH D:\SERVER\shop-v1\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>