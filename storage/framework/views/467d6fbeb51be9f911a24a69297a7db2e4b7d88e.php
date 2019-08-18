<?php $__env->startSection('title', 'Subscribers List'); ?>

<?php $__env->startSection('content'); ?>

    <h2 class="text-center"><a href="<?php echo e(route('admin.import.emails')); ?>">Generate Subscribers(100) </a> </h2>


    <?php
        $per_page = app('request')->input('per_page') ?? 10;
        $page = app('request')->input('page') ?? 1;
        $order = app('request')->input('order') ?? 'DESC';

        if ($order == 'DESC') {
            $order = 'ASC';
        }else{
            $order = 'DESC';
        }

        $page_start = $page * $per_page - $per_page;
        $page_end = $page * $per_page;

        if ($page_start == 0) {
            $page_start = 1;
            $page_end = $per_page;
            print "herh";
        }
        
    ?>

    <div class="container">
        <p>Showing <?php echo e($page_start); ?> to <?php echo e($page_end); ?> of <strong><?php echo e($total_items); ?></strong> entries</p>

        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Items Per Page</button>
            
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?per_page=5">5</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?per_page=10">10</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?per_page=25">25</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?per_page=50">50</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?per_page=100">100</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?per_page=1000">1000</a>

                <div class="dropdown-divider"></div>
            </div>
        </div>
    </div>



    <table class="ui celled table" style="width:100%">
        <thead>
            <tr>                
                <th><a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?sortby=id&order=<?php echo e($order); ?>">id</a></th>
                <th><a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?sortby=email&order=<?php echo e($order); ?>">email</a></th>
                <th><a class="dropdown-item" href="<?php echo e(route('admin.subscribes')); ?>?sortby=created_at&order=<?php echo e($order); ?>">created_at</a></th>
                <th></th>
                <th></th>                 
            </tr>
        </thead>
        
        <tbody>            
            <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                <tr> 
                    <td><?php echo e($detail->id); ?> </td>
                    <td><?php echo e($detail->email); ?> </td>
                    <td><?php echo e($detail->created_at); ?> </td>

                    <td><a href="edit/<?php echo e($detail['id']); ?>">EDIT</a></td>
                    <td><a href="delete/<?php echo e($detail['id']); ?>">DELETE</a></td>
                </tr>                                  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
        
        </tbody>

    </table>
    <hr>

    <div class="d-flex justify-content-center">
        <?php echo e($emails->appends(['per_page' => $items_per_page])->links()); ?>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\shop-v1\resources\views/admin/subscribers.blade.php ENDPATH**/ ?>