<?php $__env->startSection('title', 'Countries List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <table class="table table-hover table-striped table-bordered">
            
            <?php ($i = 0); ?>

            <?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr> 
                    <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($i == 0): ?>                        
                            <td> <?php echo e($name); ?> </td>                           
                        <?php endif; ?>                      
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr> 

                <tr>                        
                    <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td> <?php echo e($value); ?> </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <td><a href="edit/<?php echo e($social['id']); ?>">EDIT</a></td>
                    <td><a href="delete/<?php echo e($social['id']); ?>">DELETE</a></td>

                </tr>

                <?php ($i++); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
        </table>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\shop-v1\resources\views/listregion/countries.blade.php ENDPATH**/ ?>