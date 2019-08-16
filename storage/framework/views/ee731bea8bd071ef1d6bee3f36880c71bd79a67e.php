<?php $__env->startSection('title', 'Socials List'); ?>

<?php $__env->startSection('content'); ?>        

    <h2>Add New Social Platform </h2>
        
    <form method="post" name="update" action="save">

        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="usr">Platform Name:</label>
            <input type="text" class="form-control" name="name">
        </div>                           
            
        <hr>

        <div class="w-90 container clearfix text-center">
            <button type="submit" class="pl-4 pr-4 btn-lg btn-primary float-left" name="submit" value="good">SAVE</button>
        </div>              

    </form>	
  
<?php $__env->stopSection(); ?>
            

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\shop-v1\resources\views/admin/socials/platforms/new.blade.php ENDPATH**/ ?>