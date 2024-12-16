<?php $__env->startSection('content'); ?>
<?php echo $__env->make('patients.partials.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('patients.partials.appointment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('patients.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="col-lg-12 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Icons</li>
			<li>Patient Profile</li>
		</ol>
	</div><br><!--/.row-->
	<!-- Modal -->
<?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
        <div class="alert alert-danger">
            <p><?php echo e($message); ?></p>
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
				<div class="panel-heading">Patient Name: <?php echo e($patient->first_name); ?> <?php echo e($patient->middle_name); ?> <?php echo e($patient->last_name); ?>

				<a class="btn btn-primary pull-right" data-toggle="modal" href="#editPatient"><span class="glyphicon glyphicon-edit"></span> Edit Patient</a></div>
				<div class="panel-body">
				<div class="col-md-6">
				Patient Phone: <?php echo e($patient->phone); ?><br>
				Patient Address: <?php echo e($patient->location); ?>, <?php echo e($patient->state); ?>, <?php echo e($patient->district); ?>,<?php echo e($patient->country); ?><br>
				<?php if($patient->relative_name): ?>
				Relatives Name: <?php echo e($patient->relative_name); ?><br>
				Relative Phone: <?php echo e($patient->relative_phone); ?><br>
				<?php endif; ?>
				Age: <?php echo e($patient->age); ?><br>
				Blood Group: <?php echo e($patient->blood_group); ?><br>
				</div>
				<div class="col-md-6">
				<b>Gender: </b> <?php echo e($patient->gender); ?><br>
				<b>DOB: </b> <?php echo e($patient->birth_date); ?><br>
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Patient Appointment
				<a class="btn btn-primary pull-right" data-toggle="modal" href="#addAppointment"><span class="glyphicon glyphicon-plus"></span>Add Appointment</a></div>
				<div class="panel-body">
				<?php if($patient->appointments->count()): ?>
				<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				   	 	<thead>
				        <tr>
				        	<th data-sortable="true">ID</th>
				            <th data-sortable="true">Appointment Name</th>
					        <th data-sortable="true">Doctor Name</th>
					        <th data-sortable="true">Description</th>
					        <th data-sortable="true">Time</th>
					        <th>Status</th>
					        <th data-sortable="true">Action</th>

						    </tr>
					    </thead>
					    <tbody>
					   
					    <?php $__currentLoopData = $patient->appointments()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					    <td><?php echo e($appointment->id); ?></td>
					    <td><?php echo e($appointment->name); ?></td>
					    <td><?php echo e($appointment->doctor->employee->first_name); ?> <?php echo e($appointment->doctor->employee->last_name); ?></td>
					    <td><?php echo e($appointment->description); ?></td>
					    <td><?php echo e($appointment->time); ?></td>
					    <td>
					    <?php if($appointment->status): ?>
					   	<a class="btn-sm btn-success" href="<?php echo e(route('appointment.edit',$appointment->id)); ?>"><span class=" glyphicon glyphicon-ok"></span> Complete</a>	
						<?php else: ?>
						<a class="btn-sm btn-warning" href="<?php echo e(route('appointment.edit',$appointment->id)); ?>"><span class=" glyphicon glyphicon-refresh"> </span> Pending</a>
						<?php endif; ?>
					   </td>
					   <td> <a class="btn-sm btn-info" href="<?php echo e(route('appointment.index')); ?>"><span class=" glyphicon glyphicon-eye-open"> </span> View all..</a>
                       </td>
                       </tr>
					   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					   
					    </tbody>
					</table>
					<?php else: ?>
					<h3>No records..</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>

			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Patient Report</div>
				<div class="panel-body">
				<?php if($patient->reports->count()): ?>
				<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				   	 	<thead>
				        <tr>
				        	<th data-sortable="true">ID</th>
				            <th data-sortable="true">Report Name</th>
					        <th data-sortable="true">Status</th>
					        <th data-sortable="true">Action</th>
					    </tr>
					    </thead>
					    <tbody>
					   
					    <?php $__currentLoopData = $patient->reports()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					    <td><?php echo e($report->id); ?></td>
					    <td><?php echo e($report->report); ?></td>
					   <?php if($report->status): ?>
					    <td><span class="btn-sm btn-primary glyphicon glyphicon-ok">  Complete</span> </td>
					    <?php else: ?>
					    <td><span class="btn-sm btn-warning glyphicon glyphicon-refresh">Pending </span> </td>
					    <?php endif; ?>
					   <?php if($report->report): ?>
					    <td><a href="<?php echo e(url('/reports/'.$report->report)); ?>" class="btn-sm btn-success" target="_blank"><span class=" glyphicon glyphicon-print">Print</a></td>
					    <?php else: ?>
					    <td>Not Available</td>
					    <?php endif; ?>
                       </tr>
					   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					   
					    </tbody>
					</table>
					<?php else: ?>
					<h3>No records..</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>


</div>
</div>



<script>
        $(document).ready( function() {
            $('#doctorId').on('change', function() {
                var id = $('#doctorId').val();
                //ajax
              $('#available_time').load(<?php echo json_encode(url('/days/')); ?>+'/'+id);
            });
             $( "#datepicker" ).datepicker();
                $('#datepicker').change(function(){
                	$("#datepicker").datepicker('hide')
                });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>