<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Admin</li>
				<li class="active"><a href="/employee">Employee</a></li>
			</ol>
		</div><br><!--/.row-->
<!-- Modal -->
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
                    <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Employee Table
					<a class="btn btn-success pull-right" data-toggle="modal" href="<?php echo e(route('employee.create')); ?>"><span class="glyphicon glyphicon-plus"></span>Add Employee</a></div>
					<div class="panel-body">
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
						    <thead>
				        <tr>
				            <th data-sortable="true">ID</th>
					        <th data-sortable="true">Name</th>
					        <th data-sortable="true">Contact</th>
					        <th data-sortable="true">Working Days</th>
					        <th data-sortable="true">In-time</th>
					        <th data-sortable="true">Out-time</th>
					        <th data-sortable="true">Type</th>
					        <th data-sortable="true">Action</th>
						    </tr>
					    </thead>
					    <tbody>
				    	<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
				            <td><?php echo e($employee->id); ?></td>
				            <td><?php echo e($employee->first_name); ?> <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></td>
				           	<td><?php echo e($employee->phone); ?></td>
				           	<td><?php echo e($employee->working_day); ?></td>
				    		<td><?php echo e($employee->in_time); ?></td>
				    		<td><?php echo e($employee->out_time); ?></td>
				    		<td><?php echo e($employee->type); ?></td>
				            <td>
				             <a class="btn btn-sm btn-primary glyphicon glyphicon-eye-open" href="<?php echo e(route('employee.show',$employee->id)); ?>"></a>
				            
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</div><!--/.main-->
<script type="text/javascript">
$(document).ready(function() {
  $(".select").select2();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>