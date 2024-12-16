<?php $__env->startSection('content'); ?>
<?php echo $__env->make('reports.partials.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Patient Report</li>
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
					<div class="panel-heading">Report</div>
					<div class="panel-body">
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
				            <th>S.N.</th>
				            <th>Report No.</th>
					        <th>Patient Name</th>
					        <th >Register Date:</th>
					        <th >Status</th>
					        <th>Action</th>
						    </tr>
						</thead>
						    <tbody>
						    
						     <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    	<tr>
						    	<td><?php echo e(++$key); ?></td>
						    	<td><?php echo e($setting->invoice_prefix.' '.$report->id); ?></td>
						    	<td><?php echo e($report->patient->first_name); ?> <?php echo e($report->patient->middle_name); ?> <?php echo e($report->patient->last_name); ?>

						    	</td>
						    	<td><?php echo e($report->created_at); ?></td>
						    	<td>
	                           	<?php if($report->status): ?>
						    	<span class="btn-sm btn-success glyphicon glyphicon-ok">Complete
						    	</span>
						    	<?php else: ?>
						    	<span class="btn-sm btn-warning glyphicon glyphicon-remove">Waiting</span>
						    	<?php endif; ?>
					    		</td>
					    		
					           	<td>
	                           		<button class="edit-modal btn-sm btn-success" onclick="edit(this.id)" id="<?php echo e($report->id); ?>""><span class="glyphicon glyphicon-edit"></span> Edit
                           	 		</button>
                           	 		 <a href="<?php echo e(route('report.generate',$report->id)); ?>" class="btn btn-sm btn-danger" ><span class="glyphicon glyphicon-print"></span>Generate</a>
		                        <?php if($report->report): ?>
		                            <a class="btn btn-sm btn-warning" href="<?php echo e(url('/reports/'.$report->report)); ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Print</a>
		                        <?php endif; ?>
		                      	</td>
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
  function edit(id)
  {
  	$('.edit_report').load(<?php echo json_encode(url('/report/edit')); ?>+'/'+id);
  	$('#edit_report').modal('show');
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>