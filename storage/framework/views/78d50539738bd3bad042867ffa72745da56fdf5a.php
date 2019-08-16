<?php $__env->startSection('title', 'Cities List'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container mt-5">

        <form action="<?php echo e(route('client.subscribe')); ?>" method="POST">

            <?php echo e(csrf_field()); ?> 
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">GDPR Compliant</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\shop-v1\resources\views/layouts/subscribe.blade.php ENDPATH**/ ?>