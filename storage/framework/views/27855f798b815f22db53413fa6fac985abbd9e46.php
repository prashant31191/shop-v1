<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- SLICK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <!-- SLICK -->

<style>
    body {
        padding-top: 20px;        
    }
    
</style>
<title>Test Products</title>

<div class="container">    
    <div class="col">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                <div class="col-lg-3 col-md-5 mb-4">
                    <div class="card h-70">

                        

                        <div class="carousel">
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                <img src="<?php echo e($image); ?>">                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                   
                        </div>

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?php echo e($product->name); ?></a>
                            </h4>
                            <h5>MDL <?php echo e($product->price); ?></h5>
                        </div>

                    </div>
                </div>            

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>

<!-- SLICK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<!-- SLICK -->

<script>
    $(document).ready(function(){
        $('.carousel').slick({
            dots: true,
            arrows: false
        //setting-name: setting-value
        });
    });
</script>
<?php /**PATH /opt/lampp/htdocs/shop-v1/resources/views/products/test.blade.php ENDPATH**/ ?>