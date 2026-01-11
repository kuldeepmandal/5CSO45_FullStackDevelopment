

<?php $__env->startSection('title', 'Add New Student'); ?>

<?php $__env->startSection('content'); ?>
    
    <form action="index.php?action=store" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>
        </div>
        
        <button type="submit" class="btn btn-success">Add Student</button>
        <a href="index.php?action=index" class="btn">Cancel</a>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tutorial-8/app/views/students/create.blade.php ENDPATH**/ ?>