<?php $__env->startSection('title', 'Socials List'); ?>

<?php $__env->startSection('content'); ?>

    <h2 class="text-center"><a href="<?php echo e(route('socials.new')); ?>">Create New Social Account </a> </h2>

    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>SOCIAL PLATFORM ID</th>
                <th>CONTACT DATA ID</th>
                <th>NAME</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>                 
            </tr>
        </thead>
        
        <tbody>
            
            <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>  
                    <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                    
                        <?php if($name == 'image'): ?>
                            <td><img src="<?php echo e($value); ?>" style="height: 40px"> </td>                      
                        <?php else: ?>
                            <td><?php echo e($value); ?> </td>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                    <td><a href="edit/<?php echo e($detail['id']); ?>">EDIT</a></td>
                    <td><a href="delete/<?php echo e($detail['id']); ?>">DELETE</a></td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
        </tbody>
        
        <tfoot>
            <tr>
                <th>ID</th>
                <th>SOCIAL PLATFORM ID</th>
                <th>CONTACT DATA ID</th>
                <th>NAME</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th></th>
                <th></th>     
            </tr>
        </tfoot>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\shop-v1\resources\views/admin/socials/list.blade.php ENDPATH**/ ?>