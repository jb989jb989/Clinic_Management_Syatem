<!-- Edit Modal -->
<div class="modal fade" id="editDoctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit <?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?></h4>
      </div>
     <?php echo Form::model($doctor, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['doctor.update', $doctor->id]]); ?>

      <div class="modal-body">
      <div class="row">
      
      	<div class="col-md-4 form-group">
      	<label>Select Doctor:</label>
      	<select name="employee_id" class="form-control" required>
      	<option value="<?php echo e($doctor->employee->id); ?>"><?php echo e($doctor->employee->first_name); ?> <?php echo e($doctor->employee->middle_name); ?> <?php echo e($doctor->employee->last_name); ?></option>
      	<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      	
      	<option value="<?php echo e($employee->id); ?>">DR.<?php echo e($employee->first_name); ?> <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></option>
      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      	</select>
      	</div>
		<div class=" col-md-4 form-group">
			<label>Doctor Fee:</label>
		 	<?php echo Form::input('number','fee' ,null, array('class' => 'form-control', 'required'=>'required')); ?>

		</div>
		<div class="col-md-4 form-group">
			<label>OPD Charge:</label>
			<?php echo Form::input('number', 'opd_charge' ,null, array('class' => 'form-control', 'required'=>'required')); ?>

	    </div>
      <div class="form-group">
            <label for="with_tax">With Tax</label>
            <input type="checkbox" name="with_tax" id="with_tax" >
          </div>
		
      </div>
		
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-danger" type="reset">Reset</button>
        <button class="btn btn-success" type="submit">Save changes</button>
   
    <?php echo e(Form::close()); ?>

    <a class="btn btn-danger pull-left" id="delete_doctor"><span class="glyphicon glyphicon-remove "></span>Delete</a>
      </div>
  </div>
</div>
</div>
</div>