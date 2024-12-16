<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Users</li>
	</ol>
</div><br>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
<?php endif; ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Role<a class="btn btn-sm btn-primary pull-right" href="<?php echo e(url('/')); ?>">Back <span class="glyphicon glyphicon-share-alt"></span></a></div>
			<div class="panel-body">
            <form action="<?php echo e(route('role.store')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Role Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required="">
                    <label>Description</label>
                    <input class="form-control" name="description" required="" value="<?php echo e(old('description')); ?>">
                </div>
                <div class="col-md-9 form-group">
                    <label>Permission</label>
                    <div class="row">
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object => $controller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2">
                            <strong><?php echo e(ucfirst($object)); ?></strong>
                            <?php $__currentLoopData = $controller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkboxes in-row ">
                                <input id="<?php echo e($permission->id); ?>" type="checkbox" value="<?php echo e($permission->id); ?>" name="permission_ids[]" <?php echo e(!in_array($permission->id, old('permission_ids', [])) ?: 'checked="true"'); ?>><label for="<?php echo e($permission->id); ?>"><?php echo e($permission->action); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
                    <button class="btn-sm btn btn-success" type="submit">Save</button>

                </div>

            </div>

        </div>

    </div>

</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>