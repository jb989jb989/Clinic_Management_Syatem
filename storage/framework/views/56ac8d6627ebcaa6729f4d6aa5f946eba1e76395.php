<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Users</li>
	</ol>
</div><br>
<?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
<?php endif; ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Manage Role<a class="btn btn-sm btn-primary pull-right" href="<?php echo e(route('role.create')); ?>">Add Role <span class="glyphicon glyphicon-share-alt"></span></a></div>
				<div class="panel-body">
					<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($role->id); ?></td>
						<td><?php echo e($role->name); ?></td>
						<td><?php echo e($role->description); ?></td>
						<td>
							<a href="<?php echo e(route('role.edit', $role->id)); ?>" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
						</td>
						<td>
							<form action="<?php echo e(route('role.destroy', $role->id)); ?>" method="POST">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></sapn></button>
							</form>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>