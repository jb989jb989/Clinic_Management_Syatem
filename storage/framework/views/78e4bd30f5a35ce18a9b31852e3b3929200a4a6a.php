<?php $__env->startSection('content'); ?>
<?php echo $__env->make('appointments.partials.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('appointments.partials.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('appointments.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-lg-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
				<li>Appointment</li>
			</ol>
		</div><br><!--/.row-->
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
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
					<div class="panel-heading">Appointment Table<a class="btn btn-success pull-right" data-toggle="modal" href="#addAppointment"><span class="glyphicon glyphicon-plus"></span>Add Appointment</a></div>
					<div class="panel-body">
					<?php if($appointments->count()): ?>
						<table id="example" class="table table-bordered table-striped table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
			            	<th data-sortable="true">ID</th>
					        <th data-sortable="true">Name</th>
					        <th data-sortable="true">Patient Name</th>
					        <th data-sortable="true">Doctor</th>
					        <th data-sortable="true">Description</th>
					        <th data-sortable="true">Time</th>
					        <th>Date</th>
					        <th data-sortable="true">Status</th>
					        <th data-sortable="true">Action</th>
						    </tr>
						</thead>
						    <tbody>
						    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    	<tr>
						    	<td><?php echo e($appointment->id); ?></td>
						    	<td><?php echo e($appointment->name); ?></td>
						    	<td><?php echo e($appointment->patient->first_name); ?> <?php echo e($appointment->patient->last_name); ?></td>
						    	<td><?php echo e($appointment->doctor->employee->first_name); ?> <?php echo e($appointment->doctor->employee->middle_name); ?> <?php echo e($appointment->doctor->employee->last_name); ?></td>
						    	<td><?php echo e($appointment->description); ?></td>
						    	<td><?php echo e($appointment->time); ?></td>
						    	<td><?php echo e($appointment->appointment_date); ?></td>
								<td> 
									<?php if($appointment->status): ?>
								   	<a class="btn btn-sm btn-success" href="<?php echo e(route('appointment.edit',$appointment->id)); ?>"><span class=" glyphicon glyphicon-ok"></span> Completed</a>	
									<?php else: ?>
									<a class="btn btn-sm btn-warning" href="<?php echo e(route('appointment.edit',$appointment->id)); ?>"><span class=" glyphicon glyphicon glyphicon-refresh"> </span> Pending</a>
									<?php endif; ?>
								</td>
						    	<td><button class="edit-appointment btn btn-primary" data-info="<?php echo e($appointment->id); ?>,<?php echo e($appointment->name); ?>,<?php echo e($appointment->description); ?>,<?php echo e($appointment->time); ?>,<?php echo e($appointment->doctor_id); ?>,<?php echo e($appointment->patient_id); ?> <?php echo e($appointment->working_date); ?>"><span class="glyphicon glyphicon-edit"></span> Edit
                        		</button>
                        		<?php if ( Auth::check() && in_array('appointment.delete', Auth::user()->role->permissions->pluck('name')->toArray())): ?>
						        <button class="delete-modal btn btn-danger"
						        data-info="<?php echo e($appointment->id); ?>" id="deleteConfirm">
						        <span class="glyphicon glyphicon-trash"></span> Delete
						        </button>
						        <?php endif; ?>
						        </td>
						    	</tr>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    </tbody>
						</table>
						<?php else: ?>
						<h3 align="center">Sorry No appointment Found</h3>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</div><!--/.main-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>