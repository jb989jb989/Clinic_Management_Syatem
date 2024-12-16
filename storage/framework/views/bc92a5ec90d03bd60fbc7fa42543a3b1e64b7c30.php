<!-- Edit Modal -->
<div class="modal fade" id="editPatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width: 75%">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Patient</h4>
      </div>
      <?php echo Form::model($patient, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['patient.update', $patient->id]]); ?>

      <div class="modal-body">
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
		 	<?php echo Form::input('number','phone' ,null, array('class' => 'form-control')); ?>

		</div>
		 <div class=" col-md-4 form-group">
	        <label>Gender:</label>
	        <select name="gender" class="form-control" required>
	        <option value="male">Male</option>
	        <option value="female">Female</option>
	        <option value="other">Other</option>
	        </select>
	    </div>
	     <div class=" col-md-4 form-group">
	        <label>Marital Status:</label>
	        <select name="marital_status" class="form-control">
	        <?php if($patient->marital_status): ?>
	        <option value="<?php echo e($patient->marital_status); ?>"><?php echo e($patient->marital_status); ?></option>
	        <?php else: ?>
	        <option></option>
	        <?php endif; ?>
	        <option value="married">Married</option>
	        <option value="single">Single</option>
	        <option value="other">Other</option>
	        </select>
	    </div>
	      <div class=" col-md-4 form-group">
	        <label>Blood Group:</label>
	        <select name="blood_group" class="form-control">
	        <?php if($patient->blood_group): ?>
	        <option value="<?php echo e($patient->blood_group); ?>"><?php echo e($patient->blood_group); ?></option>
	        <?php else: ?>
	        <option value="">Select</option>
	        <?php endif; ?>
	        <option>A+</option>
	        <option>A-</option>
	        <option>B+</option>
	        <option>B-</option>
	        <option>AB+</option>
	        <option>AB-</option>
	        <option>O+</option>
	        <option>O-</option>
	        </select>
	    </div>
		<div class=" col-md-4 form-group">
			<label>Date of Birth:</label>
			<?php echo Form::text('birth_date', null, array('class' => 'form-control' , 'id'=>'nepaliDate5')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>Age:</label>
		 	<?php echo Form::input('number','age' ,null, array('class' => 'form-control','required'=>'required')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>Relative Name:</label>
		 	<?php echo Form::text('relative_name', null, array('class' => 'form-control')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>Relative Phone:</label>
		 	<?php echo Form::input('number','relative_phone' ,null, array('class' => 'form-control')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>Country:</label>
		 	<?php echo Form::text('country', '', array('class' => 'form-control')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>State:</label>
		 	<?php echo Form::text('state', '', array('class' => 'form-control')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>District:</label>
		 	<?php echo Form::text('district', '', array('class' => 'form-control')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>Location:</label>
			<?php echo Form::textarea('location', null, array('class' => 'form-control','required'=>'required','size' => '5x3')); ?>

		</div>
		
		<div class=" col-md-4 form-group">
			<label>Occupation:</label>
			<?php echo Form::textarea('occupation', null, array('class' => 'form-control', 'size' => '5x3')); ?>

		</div>
		<div class=" col-md-4 form-group">
			<label>Descrption:</label>
			<?php echo Form::textarea('description', null, array('class' => 'form-control', 'size' => '5x3')); ?>

		</div>
		
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-danger" type="reset">Reset</button>
           <button class="btn btn-success" type="submit">Save changes</button>
           <?php echo e(Form::close()); ?>

     <?php if ( Auth::check() && in_array('patient.destroy', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
    <?php echo Form::open(['method' => 'DELETE','route' => ['patient.destroy', $patient->id],'id' =>'deleteConfirm','style'=>'display:inline','class'=>'pull-left']); ?>

     <button type="submit" name="" class="btn  btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button>
   
    <?php echo Form::close(); ?>

     
     <?php endif; ?>
    </div>
    
  </div>
</div>
</div>
</div>
