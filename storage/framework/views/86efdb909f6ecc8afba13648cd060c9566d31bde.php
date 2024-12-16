<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Admin</li>
				<li class="active"><a href="<?php echo e(route('employee.index')); ?>"> Employee</a></li>
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
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Employee
					<a class="btn btn-primary pull-right" href="<?php echo e(route('employee.index')); ?>"><span class="glyphicon glyphicon"></span>Back</a></div>
					<div class="panel-body">
          			
      				<div class="container">
	     <?php echo Form::model($employee, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['employee.update', $employee->id]]); ?>

	     <div class="container">
	      <div class="row">
	      
	      	<div class=" col-md-4 form-group">
				<label>First Name:</label>
			 	<?php echo Form::text('first_name', null, array('class' => 'form-control', 'required'=>'required')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Middle Name:</label>
			 	<?php echo Form::text('middle_name', null, array('class' => 'form-control')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Last Name:</label>
			 	<?php echo Form::text('last_name', null, array('class' => 'form-control', 'required'=>'required')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Email:</label>
			 	<?php echo Form::email('email', null, array('class' => 'form-control')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Phone:</label>
			 	<?php echo Form::input('number','phone' ,null, array('class' => 'form-control', 'required'=>'required')); ?>

			</div>
				<div class=" col-md-4 form-group">
				<label>Type:</label>
			 	<select class="form-control" name="type" required >
			 	
			 	<option><?php echo e($employee->type); ?></option>
			 	<option>Doctor</option>
			 	<option>Laboratory</option>
				<option>Reception</option>
				<option>Pharmacy</option>
				<option>Acountant</option>
				<option>Nurse</option>	
				<option>Other</option>
			 	</select>
			</div>
			<div class=" col-md-4 form-group">
				<label>Address:</label>
				<?php echo Form::textarea('address', null, array('class' => 'form-control', 'size' => '5x3' ,'required'=>'required')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Education:</label>
				<?php echo Form::textarea('education', null, array('class' => 'form-control', 'size' => '5x3')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Descrption:</label>
				<?php echo Form::textarea('description', null, array('class' => 'form-control', 'size' => '5x3')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Certificate:</label>
				<?php echo Form::textarea('certificate', null, array('class' => 'form-control', 'size' => '5x3')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Speciality:</label>
				<?php echo Form::textarea('speciality', null, array('class' => 'form-control', 'size' => '5x3')); ?>

			</div>
			<div class=" col-md-4 form-group">
		        <label>Working Day:</label>
		        <select name="working_day[]" class="form-control" multiple="">
		        <option>Sunday</option>
		        <option>Monday</option>
		        <option>Tuesday</option>
		        <option>Wednesday</option>
		        <option>Thursday</option>
		        <option>Friday</option>
		        <option>Saturday</option>   
		        </select>
		    </div>
		    <div class=" col-md-4 form-group">
				<label>In-Time:</label>
			 	<?php echo Form::text('in_time', null, array('class' => 'form-control timepicker' , 'required'=>'required')); ?>

			</div>
			<div class=" col-md-4 form-group">
				<label>Out-Time:</label>
			 	<?php echo Form::text('out_time', null, array('class' => 'form-control timepicker', 'required'=>'required')); ?>

			</div>
			<div class=" col-md-4 form-group">
		        <label>Department:</label>
		        <select name="department_id" class="form-control" required >
		        <option value="<?php echo e($employee->department_id); ?>"><?php echo e($employee->department->name); ?></option>
		            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        </select>
		    </div>
			
	      </div>
	    <div class="modal-footer">
	    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
	        <button class="btn btn-success" type="submit">Save changes</button>
	        <?php echo e(Form::close()); ?>

	    <a class="btn btn-danger pull-left" id="delete_employee"><span class="glyphicon glyphicon-remove "></span>Delete</a>
	        
	    </div>
	    
	  </div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="modal fade" id="employee_delete"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Employee</h4>
      </div>
       <?php echo Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id]]); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="delete_id">
      	<label>Are your sure want to delete this employee?</label>
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button"><span class='glyphicon glyphicon-remove'></span> No</button>
           <button class="btn btn-danger" type="submit"><span class='glyphicon glyphicon-remove'></span> Yes</button>
    </div>
    <?php echo e(Form::close()); ?>

  </div>
</div>
</div>
<script type="text/javascript">
	$('#delete_employee').click(function()
	{
		$('#employee_delete').modal('show');
		$('#editEmployee').modal('hide');
		
	})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>