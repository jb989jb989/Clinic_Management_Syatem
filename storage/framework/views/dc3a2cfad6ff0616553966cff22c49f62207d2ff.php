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
<?php if($error = Session::get('error')): ?>        
<div class="alert alert-danger">
            <ul>
               <?php echo e($error); ?>

            </ul>
        </div>
    <?php endif; ?>
    <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Total Collection</div>
					<div class="panel-body">
					<div class="row">
					<form action="<?php echo e(route('search.invoice')); ?>" method="GET">
						<div class="col-md-3">
							<select name="user_id" class="form-control">
								<option value="">Select User Report:</option>
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
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
								<th>Payment</th>
								<th>Sub Total</th>
								<th>Discount</th>
								<th>Tax Amount</th>
								<th>Total Amount</th>
								<th>Date</th>
								<th>Return</th>
								
								<th>Duplicate</th>
								
							</tr>
						</thead>
						<tbody>
						<?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
							<td><?php echo e($invoice->invoice_no); ?></td>
							<td><?php echo e($invoice->payment_type); ?></td>
							<td>$<?php echo e(number_format($invoice->sub_total, 2)); ?></td>
							<td>$<?php echo e($invoice->discount); ?></td>
							<td>$<?php echo e(number_format($invoice->tax_amount, 2)); ?></td>
							<td>$<?php echo e(number_format($invoice->total_amount, 2)); ?></td>
							<td><?php echo e($invoice->created_at); ?></td>
							<?php if($invoice->invoiceReturns()->get()->count()): ?>
								<?php $__currentLoopData = $invoice->invoiceReturns()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<td>Return: $<?php echo e($return->return_amount); ?></td>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
							<td><a class="btn btn-sm btn-primary invoiceReturn" data-return="<?php echo e($invoice->id); ?>, <?php echo e($invoice->invoice_no); ?>, <?php echo e(number_format($invoice->total_amount)); ?>"><span class="glyphicon glyphicon-share-alt"></span>Return Bill</a>
							</td>
							<?php endif; ?>
							
							<td>
								<a href="<?php echo e(route('invoice.duplicate', $invoice->id)); ?>" class=" btn-sm btn btn-primary">Re-Print Bill</a>
							</td>
							
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
						<tr>
							<th>Total:</td>
							<th></th>
							<th>$<?php echo e(number_format($total['sub_total'], 2)); ?></th>
							<th>$<?php echo e($total['discount']); ?></th>
							<th>$<?php echo e(number_format($total['tax_amount'], 2)); ?></th>
							<th>$<?php echo e(number_format($total['total_amount'], 2)); ?></th>
							
							<td>Complete</td>
						</tr>
						
						
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="returnInvoice" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Return Invoice</h4>
      </div>
      <?php echo Form::open(array('route' => 'invoice.return','method'=>'POST')); ?>

      <div class="modal-body">
      <div class="row">
      <input type="hidden" name="id" id="id">
	      	<div class="col-md-12 form-group">
	      	<label>Invoice No:</label>
	      		<input type="text" name="invoice_no" id="invoice_no" disabled="" class="form-control">
	      	</div>

	      	<div class="col-md-12 form-group">
	      		<label>Invoice Amount($):</label>
	      		<input type="text" name="amount" id="amount" readonly="" class="form-control">
	      	</div>

	      	<div class="col-md-12 form-group">
      			<label>Return Amount:</label>
      			<input type="number" name="return_amount"  required="" class="form-control">
      		</div>

      		<div class="col-md-12 form-group">
      			<label>Return Reason:</label>
      			<input type="text" name="reason"  required="" class="form-control">
      		</div>
      </div>
       <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-danger" type="reset">Reset</button>
           <button class="btn btn-success" type="submit">Save changes</button>
    </div>
    <?php echo e(Form::close()); ?>

  </div>
<script type="text/javascript">
	$(document).ready(function() {
    	$('.invoiceReturn').on('click', function() {
	        $('#returnInvoice').modal('show');
	        var stuff = $(this).data('return').split(',');
	        fillmodalData(stuff)
    	});
    });

   function fillmodalData(details)
    {
        $('#id').val(details[0]);
        $('#invoice_no').val(details[1]);
        $('#amount').val(details[2]);
    }

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