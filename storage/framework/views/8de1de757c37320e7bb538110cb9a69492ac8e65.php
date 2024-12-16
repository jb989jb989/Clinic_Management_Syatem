<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Doctor</li>
			</ol>
		</div><br><!--/.row-->
<!-- Modal -->
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
                    <?php echo e($error); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Doctor Table</div>
					<div class="panel-body">
						<table class="table table-bordered table-condensed">
						    <thead>
						    <tr>
						        <th>ID</th>
						        <th>Name</th>
						        <th>Phone</th>
						        <th>Department</th>
						        <th>OPD Fee</th>
						       
						        <th>Action</th>

						    </tr>
						    </thead>
						     <tbody>
				    	<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr >
				            <td><?php echo e($doctor->id); ?></td>
				            <td><?php echo e($doctor->employee->first_name); ?> <?php echo e($doctor->employee->middle_name); ?> <?php echo e($doctor->employee->last_name); ?></td>
				            <td><?php echo e($doctor->employee->phone); ?></td>
				            <td><?php echo e($doctor->employee->department->name); ?></td>
				            <td>$<?php echo e($doctor->fee); ?></td>
				           
				    		
				            <td>
				            <a class="btn-sm btn-primary" href="<?php echo e(route('doctor.show',$doctor->id)); ?>"> <span class= "glyphicon glyphicon-eye-open"></span> View </a>  
						    </td>
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Add Doctor</div>
					<div class="panel-body">
					 <?php echo Form::open(array('route' => 'doctor.store','method'=>'POST', 'enctype'=>'multipart/form-data')); ?>

					 <div class="form-group">
				      	<label>Select Doctor:</label>
				      	<select name="employee_id" class="form-control" required>
				      	<option></option>
				      	<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      	
				      	<option value="<?php echo e($employee->id); ?>"><?php echo e($employee->first_name); ?> <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></option>
				      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				      	</select>
				    </div>
					<div class=" form-group">
							<label>Doctor Charge:</label>
						 	<input type="number" name="fee" class="form-control" required="">
					</div>
					<div class=" form-group">
							<label>OPD Charge:</label>
							<input type="number" name="opd_charge" class="form-control" required="">
					</div>
					<div class="form-group">
			    	<label for="with_tax">With Tax</label>
			    	<input type="checkbox" name="with_tax" id="with_tax" >
			    </div>
      				</div>
      			<div class="panel-footer">
				
           		<button class="btn btn-success" type="submit"><span class='glyphicon glyphicon-plus'></span>Add</button>
           		<button class="btn btn-danger pull-right" type="reset">Reset</button>
           		</div>
           		<?php echo Form::close(); ?>

				</div>
				</div>
			</div>
		</div><!--/.row-->	
</div><!--/.main-->
<script type="text/javascript">
	$('#edit_doctor').click(function()
	{
		$('.add').hide();
		$('.edit').show();

	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>