<?php $__env->startSection('content'); ?>
<?php echo $__env->make('patients.partials.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
				<li>Patient</li>
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
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Patient Table<a class="btn btn-success pull-right" data-toggle="modal" href="#addPatient"><span class="glyphicon glyphicon-plus"></span>Add Patient</a></div>
					<div class="panel-body">
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
						<thead>
				        <tr>
				            <th >ID</th>
					        <th>Name</th>
					        <th data-sortable="true">Phone</th>
					        <th data-sortable="true">Address</th>
					        <th data-sortable="true">Email</th>
					        <th data-sortable="true">Action</th>
						    </tr>
					    </thead>
					    <tbody>
				    	<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
				            <td><?php echo e($patient->id); ?></td>
				            <td><?php echo e($patient->first_name); ?> <?php echo e($patient->middle_name); ?> <?php echo e($patient->last_name); ?></td>
				           <td><?php echo e($patient->phone); ?></td>
				    		<td><?php echo e($patient->district); ?>, <?php echo e($patient->location); ?></td>
				    		<td><?php echo e($patient->email); ?></td>
				            <td>
				             <a class="btn btn-sm btn-primary glyphicon glyphicon-eye-open" href="<?php echo e(route('patient.show',$patient->id)); ?>"></a>
				            
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</div><!--/.main-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>