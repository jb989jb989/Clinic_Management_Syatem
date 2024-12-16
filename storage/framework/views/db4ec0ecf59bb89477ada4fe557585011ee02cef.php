<?php $__env->startSection('content'); ?>
<?php echo $__env->make('doctors.partials.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
	<div class="panel-heading"><?php echo e($doctor->employee->first_name); ?> <?php echo e($doctor->employee->last_name); ?>

		<a style="margin-left: 8px" class="btn btn-sm btn-primary pull-right" data-toggle="modal" href="#editDoctor"><span class="glyphicon glyphicon-edit"></span> Edit Doctor</a><a class="btn btn-sm btn-default pull-right" href="<?php echo e(url('doctor')); ?>">Back <span class="glyphicon glyphicon-share-alt"></span></a>
	</div>
	<div class="panel-body">
		<div class="col-md-6">
			<b>Address: <?php echo e($doctor->employee->address); ?></b><br>
			<b>Phone: <?php echo e($doctor->employee->phone); ?></b><br>
			<label>Email: <a href="mail:<?php echo e($doctor->email); ?>"><?php echo e($doctor->employee->email); ?></a></label><br>
			<label>Education: <?php echo e($doctor->employee->education); ?></label><br>
			<label>Description: <?php echo e($doctor->employee->description); ?></label><br>
			<label>Certificate: <?php echo e($doctor->employee->certificate); ?></label><br>
			<label>Speciality: <?php echo e($doctor->employee->spciality); ?></label><br>
		</div>
		<div class="col-md-6">
		<label>Working Days: <?php echo e($doctor->employee->working_day); ?></label><br>
		<label>Available Time: <?php echo e($doctor->employee->in_time); ?> - <?php echo e($doctor->employee->out_time); ?></label><br>
		<label>Department: <?php echo e($doctor->employee->department->name); ?></label><br>
		
		</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Doctor OPD Report
			<!-- <a class="btn btn-sm btn-success pull-right" data-toggle="modal" href="#addAppointment"><span class="glyphicon glyphicon-plus"></span>ADD OPD</a> -->
		</div>
			<div class="panel-body">
			<?php if($doctor->opd_sales()->count()): ?>
			<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
				<thead>
			<tr>
			<th data-sortable="true">No.</th>
			<th data-sortable="true">Patient Name</th>
			<th data-sortable="true">Doctor Fee</th>
			<th data-sortable="true">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			<?php $__currentLoopData = $doctor->opd_sales()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
			<td><?php echo e($i++); ?></td>
			<td><?php echo e($sales->invoice->patient->first_name); ?> <?php echo e($sales->invoice->patient->middle_name); ?> <?php echo e($sales->invoice->patient->last_name); ?></td>
			<td><?php echo e($doctor->fee); ?></td>
			<td>Complete</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</tbody>

			</table>

			<?php else: ?>
			<h1>No record Found..</h1>
			<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
 <div class="modal fade" id="doctor_delete"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Doctor</h4>
      </div>
       <?php echo Form::open(['method' => 'DELETE','route' => ['doctor.destroy', $doctor->id]]); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="delete_id">
      	<label>Are your sure want to delete this doctor?</label>
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
	$('#delete_doctor').click(function()
	{
		$('#doctor_delete').modal('show');
		$('#editDoctor').modal('hide');
		
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>