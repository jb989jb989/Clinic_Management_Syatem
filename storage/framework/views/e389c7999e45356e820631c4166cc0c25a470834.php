<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">   
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Hospital Setting</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo e($hospital->name); ?> Setting</h1>
	</div>

</div><!--/.row-->
<?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Hospital Settings</div>
			<div class="panel-body">
				<div class="col-md-12">
					<?php echo Form::model($hospital, ['method' => 'POST', 'route' => ['hospital.update', $hospital->id], 'files' => true]); ?>

						<div class="form-group">
							<label>Hospital Name:</label>
							 <?php echo Form::text('name', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Hospital Slogan:</label>
							 <?php echo Form::text('slogan', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
						<label>Change Logo:</label>
						 <?php echo Form::file('logo', null, array('class' => 'form-control')); ?>

						 </div>
						 <div class="form-group">
							<label>Email Address:</label>
							 <?php echo Form::text('email', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Website:</label>
							 <?php echo Form::text('website', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Address:</label>
							<?php echo Form::textarea('address', null, array('class' => 'form-control' , 'size' => '7x3')); ?>

						</div>
						<div class="form-group">
							<label>Contact:</label>
							<?php echo Form::textarea('contact', null, array('class' => 'form-control', 'size' => '7x3')); ?>

						</div>
						<div class="form-group">
							<label>About Us:</label>
							<?php echo Form::textarea('description', null, array('class' => 'form-control', 'size' => '5x8')); ?>

						</div>
						<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Pan Settings</div>
			<div class="panel-body">
				<div class="col-md-12">
						<div class="form-group">
							<label>Pan Number:</label>
							<?php echo Form::text('pan_no', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Registration Number:</label>
							<?php echo Form::text('registration_no', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					
						
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Tax Settings</div>
			<div class="panel-body">
				<div class="col-md-12">
						<div class="form-group">
							<label>Tax Name:</label>
							<?php echo Form::text('tax_type', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Percent (%)</label>
							<?php echo Form::text('tax_percent', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					
						
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Prefix Setting</div>
			<div class="panel-body">
				<div class="col-md-12">
						<div class="form-group">
							<label>Invoice Prefix:</label>
							<?php echo Form::text('invoice_prefix', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Patient ID Prefix:</label>
							<?php echo Form::text('patient_prefix', null, array('class' => 'form-control')); ?>

						</div>
						<div class="form-group">
							<label>Invoice  Message:</label>
							<?php echo Form::text('invoice_message', null, array('class' => 'form-control')); ?>

						</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit">Save Changes</button>
						<button class="btn btn-primary" type="reset">Default</button>
						</div>
					<?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
	</div>
	</div></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>