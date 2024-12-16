<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" crossorigin="anonymous">
<style type="text/css">
	#print {
		
    margin: auto;
    width: 70%;
    border: 3px solid green;
    padding: 10px;
}
@media  print {
    .printbtn {
        display :  none;
    }
}
</style>
</style>
<div id="print">
	<div class="row">
	<div class="col-md-12"  align="center">
	<h3><?php echo e($setting->name); ?></h3>
			<strong><?php echo e($setting->address); ?></strong>
			<address>Phone: <?php echo e($setting->contact); ?></address>
	</div>
	<div class="col-md-6">
			<strong>Patient: </strong><?php echo e($invoices->patient->first_name); ?> <?php echo e($invoices->patient->last_name); ?><br>
			<strong>Patient ID: </strong><?php echo e($setting->patient_prefix); ?><?php echo e($invoices->patient->id); ?><br>
			<?php if(isset($invoices->report_id)): ?>
				<strong>Report No. <?php echo e($setting->invoice_prefix.$invoices->report_id); ?></strong>
			<?php endif; ?>
			<strong>Age:</strong><?php echo e($invoices->patient->age); ?><br>
			<strong>Sex:</strong><?php echo e($invoices->patient->gender); ?><br>
			<strong>Payment:</strong> <?php echo e($invoices->payment_type); ?><br>
	</div>
	<div class="col-md-6" align="right" >
			<strong>Date: </strong><?php echo e($invoices->created_at); ?><br>
			<strong>Invoice#:</strong><?php echo e($invoices->invoice_no); ?>

	</div>
	
<br><br>
<div class="col-md-12">
	<table class="table table-bordered table-condensed">
		<thead>
			<tr>	
				<th>S.N.</th>
				<th>Particular</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
		<?php $i = 1; ?>
		<?php if($invoices->services): ?>
		<?php $__currentLoopData = $invoices->serviceSales()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
				<td><?php echo e($i++); ?></td>
				<td><?php echo e($sales->service_name); ?></td>
				<td>$<?php echo e(number_format($sales->amount, 2)); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php elseif($invoices->opd): ?>
		<?php $__currentLoopData = $invoices->opd_sales()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
				<td><?php echo e($i++); ?></td>
				<td><?php echo e($sales->opd_name); ?></td>
				<td>$<?php echo e(number_format($sales->opd_charge,2)); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
		<?php $__currentLoopData = $invoices->packageSales()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($i++); ?></td>
			<td><?php echo e($sales->package->name); ?></td>
			<td>$<?php echo e(number_format($sales->package_price, 2)); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
			
			<tr>
				<td></td><td></td><td><strong>Sub Total: </strong>$ <?php echo e(number_format($invoices->sub_total, 2)); ?></td>
			</tr>

			<tr>
				<td></td><td></td><td><strong>Discount: </strong>$ <?php echo e($invoices->discount); ?></td>
			</tr>
			<tr>
				<td></td><td></td><td><strong>HST(<?php echo e($setting->tax_percent); ?>%): </strong>$<?php echo e(number_format($invoices->tax_amount,2)); ?></td>
			</tr>
			<tr>
				<td></td><td></td><td><strong>Total: </strong>$<?php echo e(number_format($invoices->total_amount)); ?></td>
			</tr>
		</tbody>
		
	</table>
	</div>
		<div class="col-md-6">
			<strong>User:</strong><?php echo e($invoices->user->name); ?><br>
			
		</div>
		<div class="col-md-6" align="right">
			<strong>Cash:</strong> <?php echo e($invoices->cash); ?><br>
			----------------------------<br>
			<strong>Return:</strong>  <?php echo e(number_format($invoices->return, 2)); ?><br>	
		</div><br>
		<div class="col-md-12"><?php echo e($setting->invoice_message); ?></div>
	</div>
</div>
<br>
		<div align="center">
		<a href="<?php echo e(url('/')); ?>" class="printbtn btn btn-primary" type='button' onclick="Function()"><span class="glyphicon glyphicon-print"></span> Print</a>
		<a href="<?php echo e(url('invoice')); ?>" class="btn btn-default">Back</a>
		</div>


<script>
function Function()
{
    window.print(); 
    window.focus();


}
</script>