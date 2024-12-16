<?php $__env->startSection('content'); ?>

<div class="col-md-12 main">   
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Icon</li>
		<li> Profile </li>
	</ol>
</div><br>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <button type="button" class="close" data-dismiss="alert">×</button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
</div>
<?php endif; ?>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading"><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

		<a style="margin-left: 5px" class="btn btn-sm btn-primary pull-right" href="<?php echo e(route('employee.edit', $employee->id)); ?>"><span class=" glyphicon glyphicon-edit"> </span>Edit Employee</a><a class="btn btn-sm btn-default pull-right" href="<?php echo e(url('employee')); ?>">Back <span class="glyphicon glyphicon-share-alt"></span></a>
	</div>
	<div class="panel-body">
				<div class="col-md-6">
					<b>Address: <?php echo e($employee->address); ?></b><br>
					<b>Phone: <?php echo e($employee->phone); ?></b><br>
					<label>Email: <a href="mail:to"><?php echo e($employee->email); ?></a></label><br>
					<label>Education: <?php echo e($employee->education); ?></label><br>
					<label>Description: <?php echo e($employee->description); ?></label><br>
					<label>Certificate: <?php echo e($employee->certificate); ?></label><br>
					<label>Speciality: <?php echo e($employee->spciality); ?></label><br>
				</div>
				<div class="col-md-6">
				<label>Working Days: <?php echo e($employee->working_day); ?></label><br>
				<label>Available Time: <?php echo e($employee->in_time); ?> - <?php echo e($employee->out_time); ?></label><br>
				<label>Department: <?php echo e($employee->department->name); ?></label><br>
				
				</div>
	</div>
</div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>