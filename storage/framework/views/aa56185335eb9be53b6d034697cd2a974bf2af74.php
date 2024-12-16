<?php $__env->startSection('content'); ?>
<div class="col-sm-12  main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Invoice Report</li>
			</ol>
		</div><br><!--/.row-->
<!-- Modal -->
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>
<?php if($error = Session::get('errors')): ?>        
<div class="alert alert-danger">
            <ul>
               
                <li><?php echo e($error); ?></li>
           
            </ul>
        </div>
    <?php endif; ?>
    <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					
						Package Reports
					
					<div class="pull-right">Report From: <?php echo e($total['starting_date']); ?>/<?php echo e($total['ending_date']); ?></div></div>
					<div class="panel-body">
					<div class="row">
					<form action="<?php echo e(route('account.package')); ?>" method="GET">
						<div class="col-md-3">
							<select name="package_id" class="form-control">
								<option value="">Select Package Report:</option>
								<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($package->id); ?>"><?php echo e($package->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" class="datepicker form-control" placeholder="From Date" name="starting_date" data-date-end-date="0d" >
						</div>

						<div class="col-md-3">
							<input type="text" class="datepicker1 form-control" placeholder="To Date" name="ending_date" data-date-end-date="0d" >
						</div>
						<div class="col-md-3">
							<button class="btn btn-danger"><span class="glyphicon glyphicon-search"></span>Search Report</button>
						</div>
					</form>
					</div>
					</div>
					<div class="panel-footer">

					<table id="dataPrint" class="table table-bordered table-condensed" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Invoice No</th>
								<th>Particular</th>
								<th>Package Price</th>
								<th>Patient</th>
								<th>User</th>
								<th>Date</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th colspan="2"><b>Total:</b></th>
								<th><b>₹<?php echo e($total["total"]); ?><b></th>
								<th colspan="4"></th>
								

							</tr>
						</tfoot>
						
						<tbody>
						<?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($invoice->invoice->invoice_no); ?></td>
							<td><?php echo e($invoice->package->name); ?></td>
							<td>₹<?php echo e($invoice->package_price); ?></td>
							<td>₹<?php echo e($invoice->patient->first_name); ?></td>
							<td><?php echo e($invoice->invoice->user->name); ?></td>
							<td><?php echo e($invoice->created_at); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<tr>
							<td><b>Total:</b></td>
							<td></td>
							<td>₹<?php echo e($total['total']); ?></b></td>
							<td></b></td>
							<td></td>
							<td></td>
						</tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">


    $(document).ready(function() {
    $('#dataPrint').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>