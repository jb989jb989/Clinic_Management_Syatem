<!-- Edit Modal -->
<div class="modal fade" id="editAppointment"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Appointment </h4>
      </div>
		<div class="modal-body">
		 <div class="row">
		<?php echo Form::open(array('route' => 'appointment.updated','method'=>'POST', )); ?>


		<input name="id" type="hidden" class="form-control" id="id" >
		<div class=" col-md-4 form-group">
	        <label>Patient:</label>
	        <select name="patient_id" class="form-control" id="patient_id">
	        <option></option>
	            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </select>
	    </div>

	   <div class=" col-md-4 form-group">
	        <label>Doctor:</label>
	        <select name="doctor_id" class="form-control doctor_select" required id="doctor_id">
	        <option></option>
	            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->employee->first_name); ?> <?php echo e($doctor->employee->last_name); ?></option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </select>
	    </div>
	    <div class=" col-md-4 form-group">
			<label>Available Time:</label>
			<div class="available_time">
				<input type="text" name="time" class="form-control" id="time">
			</div>
		</div>
		<div class="col-md-4 form-group">
		<label>Appointment Date:</label>
			<input type="text" name="appointment_date" class="form-control datepicker1"  data-date-start-date="0d" id="date" required="">
		</div>
		
      	<div class=" col-md-4 form-group">
			<label>Name:</label>
		 	<?php echo Form::text('name', null, array('class' => 'form-control', 'required'=>'required', 'id'=>'name')); ?>

		</div>
		
		<div class=" col-md-4 form-group">re
			<label>Description:</label>
		 	<?php echo Form::text('description', null, array('class' => 'form-control', 'id'=>'description')); ?>

		</div>
		
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-danger" type="reset">Reset</button>
           <button class="btn btn-success" type="submit">Save changes</button>
    </div>

    <?php echo e(Form::close()); ?>

  </div>
</div>
</div>
</div>
</div>

 <script>
        $(document).ready( function() {
            $('.doctor_select').on('change', function() {
                var id = $('.doctor_select').val();
                //ajax
              $('.available_time').load(<?php echo json_encode(url('/days/')); ?>+'/'+id);
            });
                
        
        });
</script>