<?php $__env->startSection('content'); ?>

<div class="col-lg-12 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">OPD Invoice</li>
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
                <div class="panel-heading"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>OPD Invoice</div>
            <div class="panel-body">
				<div class="row">
					<div class="col-md-8">
						<!-- services -->
						
						<div class="row">
						<?php echo e(Form::open(array('route'=>'opd.store', 'method'=>'post', 'class'=>'form-group'))); ?>


						<div class="col-md-6 form-group">
							<label></label>
							<select class="form-control select" name="doctor_id" id="doctor_id">
							<option>Select Doctor:</option>
							<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  				<option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->employee->first_name); ?> <?php echo e($doctor->employee->last_name); ?></option>
			 		 		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			 		 		</select>
	 		 			</div>
	 		 			<div class="col-md-6 form-group">
							<label></label>
							<select class="form-control select" name="patient_id" id="patient_id" required>
							<option>Select Patient:</option>
							<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  						<option value="<?php echo e($patient->id); ?>">ID: <?php echo e($patient->id); ?>. <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
	 		 				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	 		 				</select>
	 		 			</div>
	 		 			
	 		 			<div class=" col-md-3 form-group">
								<label>Payment type</label>
								<select name="payment_type" class="form-control">
									<option>Cash</option>
									<option>Cheque</option>
									<option>Credit</option>
								</select>
							</div>
							<div class=" col-md-3 form-group">
							<label>Invoice No:</label>
	                        <input type="text" class="form-control" name="invoice_no" value="<?php echo e($setting->invoice_prefix); ?><?php echo e($invoice_no); ?>" readonly>
	                        </div>
	                        <div id="payment" style="display: none;">
	                       
		                        <div class="col-md-3 form-group">
								<label>Discount :</label>
								<input type="number" name="discount"  placeholder="" class="form-control" id="discount"><br>
								</div>
								
		                        <div class="col-md-3 form-group">
								<label>Cash :</label>
								<input type="number" name="cash"  placeholder="" class="form-control" id="cash" required><br>
								</div>
							</div>

							<input type="submit" id="submit" class="hidden">
							<div class="col-md-12 form-group" id="comment" style="display: none;">
								<input type="textarea" class="form-control" name="comment" placeholder="Comment..." >
							</div>
		 		 			<?php echo e(Form::close()); ?>		

		 		 		</div>
		 		 		<div class="row">
	 		 			<div class="col-md-12">
	 		 			<div id="bill"></div>
	 		 			
	 		 			</div></div>
	 		 			</div>
	 		 			<div class="col-md-4">

							<h3 class='text-center'>Payment</h3>
							<p>--------------------------------------------------------------------</p>
							<div class="row">
							<div class="col-md-6" id="calculateBtn" style="display: none">
	                            <button class="btn btn-primary" id="calculate"><span class="glyphicon glyphicon-ok"></span>Calculate</button> <br><br>
	                            <span id="msg"></span><br>
		                        
                            </div>
                            <br>
                            <div class="col-md-12">
								<div id="tender"></div>
							</div>

		 		 			
		 		 			<div class="col-md-12" id="complete" style="display: none;">
		 		 			<p>--------------------------------------------------------------------</p>
		 		 				<button class="btn btn-success" id="complete">Complete</button>
		 		 				<a href="<?php echo e(url('opd')); ?>" class="btn btn-default">Reset</a>
		 		 				
		 		 			</div>	
						</div>
 		 			</div>
	 			</div>
 			</div>
 			
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {
  	$(".select").select2();

  	$('#doctor_id').on('change', function() {
            var doctor_id = $('#doctor_id').val();
            //$('#payment').hide();
            $('#tender').hide();
         	$('#complete').hide();
         	$('#comment').hide();
        	// $('#calculateBtn').hide();
			//$('#patient_id :selected').attr('selected', false);
            $('#bill').load(<?php echo json_encode(url('/invoice/opd')); ?>+'/'+doctor_id);
            });

  	$('#patient_id').on('change', function(){
	    	var patient_id = $('#patient_id').val();
	    	$('#payment').show();
	    	$('#calculateBtn').show();
	    	//$('#patient').load(<?php echo json_encode(url('/invoice/patient')); ?>+'/'+patient_id);

	    	
	    	
	    });
  	$('#complete').on('click', '#complete', function() 
			{
				$('#submit').click();

			});

    $('#calculate').click(function(){
       	$('#tender').hide();
        $('#complete').hide();
        var cash = $('#cash').val();
        var discount = $('#discount').val();
        var sub_total = $('#opd_charge').val();
        var tax = $('#tax_percent').val();
        if(sub_total.length)
        {
       
        if(cash > 0)
        {
        	if(discount)
        	{
    			$('.total_field').hide();
        	}

        	var total = sub_total - discount;
        	var tax_amount = total * tax /100;
        	var total_amount = total + tax_amount;
        	var tender_amount = cash - total_amount;
        	
    		if(tender_amount < 0)
    		{
    			$('#msg').show();
    			$("#msg").html("<div style='color:red;margin-bottom: 20px;'><span class='btn-sm alert-danger'>Insufficient Balance...</span></div>");
    		}
    		else
    		{
    		$('#msg').hide();
        	$('#complete').show();
    		$('#comment').show();
    		$('#tender').html('<strong>Sub Total: $'+ sub_total +'</strong><br><strong>Discount:$'+ discount + '</strong><br><b>------------------------------</b><br><strong>Taxable Amount:' + total+'</strong><br><strong>HST('+ tax+'%): $'+ tax_amount +'</strong><br><b>-----------------------------<b><br><strong>Total: $'+ total_amount +'</strong><br><strong>Cash: $ ' + cash + '</strong><br><strong>Return:$' + tender_amount+ '</strong>');
    		$('#tender').show();
    		}  
    	}
        else
        {
        	$('#msg').show();
        	$("#msg").html("<div style='color:red;margin-bottom: 20px;'><span class='btn-sm alert-danger'>Enter Cash Amount...</span></div>");

        }
    }
    else
    {
    	$('#msg').show();
    	$("#msg").html("<div style='color:red;margin-bottom: 20px;'><span class='btn-sm alert-danger'>Please Select Doctor First...</span></div>");

    }

});
   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>