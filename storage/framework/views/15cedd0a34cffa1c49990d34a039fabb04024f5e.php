<?php $__env->startSection('content'); ?>
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
                    <?php echo e($error); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Lab Report Generate </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6 form group">
								<strong>Patient Name: <?php echo e($report->patient->first_name); ?> <?php echo e($report->patient->middle_name); ?> <?php echo e($report->patient->last_name); ?></strong><br>
								<strong>Patient ID#:<?php echo e($setting->patient_prefix); ?><?php echo e($report->patient_id); ?></strong>
								<br><strong>Age:<?php echo e($report->patient->age); ?></strong><br>
								<strong>Sex:<?php echo e($report->patient->gender); ?></strong>
							</div>
							<div class="col-md-3 form group pull-right">
								<strong>Report ID#: <?php echo e($report->id); ?></strong><br>
								<strong>Register Date: <?php echo e($report->created_at); ?></strong><br>
								<?php if($report->doctor_id): ?>
								<strong>Referred By: <?php echo e($report->doctor_name); ?></strong><br>
								<?php endif; ?>
							</div><br>
							<div class="col-md-12 form-group">
							<h2 align="center">Lab Report</h2><br>
							</div>
						</div>
						<div class="row">
						<?php if($test_reports->count()): ?>
							<div class="col-md-6">
							<label>Select Tests:</label>
								<select class="form-control" name="test" id="test_report">
								<option>Select Test:</option>
								<?php $__currentLoopData = $test_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($test_report->id); ?>"><?php echo e($test_report->test->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						<?php endif; ?>
						<!-- Results count -->
						<?php if($results->count()): ?> 
						<!-- forloop 1results -->
							<div class="col-md-6">
							<label>Select Result:</label>
								<select class="form-control" name="test_id" id="test_result">
								<option>Select Result:</option>
								<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($result->id); ?>"><?php echo e($result->test->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-md-12">
							<a class="btn btn-primary pull-right" href="<?php echo e(url('/report/print', $report->id)); ?>"><span class="glyphicon glyphicon-print"> </span> Print</a>
						</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>



			
<div class="modal fade" id="addResult"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:50%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Test Result</h4>
			</div>
				<?php echo Form::open(array('route' => 'result.store','method'=>'POST')); ?>

				<div class="modal-body">
					<div class="form-group">
						<div class="test_result"></div>
					</div>
				</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default" type="button"><span class='glyphicon glyphicon-remove'></span> Close</button>
				<button class="btn btn-danger" type="reset">Reset</button>
				<button class="btn btn-success" type="submit"><span class='glyphicon glyphicon-ok'></span> Save changes</button>
			</div>
			<?php echo e(Form::close()); ?>

		</div>
	</div>
</div>
</div>

<div class="modal fade" id="editResult"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:50%">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Test Result</h4>
		</div>
		<?php echo Form::open(array('route' => 'result.edit','method'=>'POST')); ?>

			<div class="modal-body">
				<div class="form-group">

					<div class="test_result"></div>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button"><span class='glyphicon glyphicon-remove'></span> Close</button>
					<button class="btn " type="reset">Reset</button>
					<button class="btn btn-primary" type="submit"><span class='glyphicon glyphicon-ok'></span> Save changes</button>
					</div>
			<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>


</div>

	
<script type="text/javascript">

	$(document).on("click", ".test_result .add-more", function(e) {
           
			e.preventDefault();
			var newLoc = $('.widal-table .widal-tr').first().clone();
			newLoc.appendTo('table.widal-table');
		});

	$(document).on("click", ".widal-table .delete", function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        });

  
 $(document).on('change', '#test_report', function() {

        var id = $('#test_report').val();
       $('.test_result').load(<?php echo json_encode(url('/result/test')); ?>+'/'+id);
       $('#addResult').modal('show');
       
    });

  $(document).on('change', '#test_result', function() {

        var id = $('#test_result').val();
       
       $('.test_result').load(<?php echo json_encode(url('/result/tests')); ?>+'/'+id);
       $('#editResult').modal('show');
       
    });

   function fillmodalData(details)
    {
        $('#id').val(details[0]);
        $('#name').val(details[1]);
        $('#value').val(details[2]);
        $('#flag').val(details[3]);
    }

     
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>