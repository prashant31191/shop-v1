<?php $__env->startSection('title', 'New Social Account'); ?>

<?php $__env->startSection('content'); ?>        

    <h2>Add New Social Accounts </h2>
        
    <form method="post" name="update" action="save">

        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="usr">Platform Name:</label>
            <input type="text" class="form-control" name="name">
        </div> 

        <div class="form-group">
            <label>Select Social Platform</label>
            <select class="form-control" name="social_platform_id">                          
                <?php $__currentLoopData = $social_platforms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>   

        <div class="form-group">
            <label>Select Contact Data </label>
            <select class="form-control" name="contact_data_id">                          
                
                    <option value="1">1</option>
            </select>
        </div> 
        <hr>

        <div class="w-90 container clearfix text-center">
            <button type="submit" class="pl-4 pr-4 btn-lg btn-primary float-left" name="submit" value="good">SAVE</button>
        </div>  

    </form>	
    
<?php $__env->stopSection(); ?>
            

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\shop-v1\resources\views/admin/socials/new.blade.php ENDPATH**/ ?>