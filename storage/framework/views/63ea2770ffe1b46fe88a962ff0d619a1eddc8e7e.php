<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Haematology Test</li>
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
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Haematology Test</div>
					<div class="panel-body">
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
				        <th>ID</th>
				        <th>Name</th>
				        <th>Test References</th>
					    </tr>
					</thead>
					<tbody>
				    <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					    	<td><?php echo e($test->id); ?></td>
					    	<td><?php echo e($test->name); ?></td>
					    	<td>
					    	<?php if(count($test->test_references)): ?>
					    		<?php $__currentLoopData = $test->test_references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
					    			<?php echo e($test_reference->name); ?>, 
					    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    <?php endif; ?>
					    	</td>	    	
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
					</table>
				</div>
			</div>
		</div>
	<div class="col-md-4" id="add_test_reference">
		<div class="panel panel-default">
			<div class="panel-heading">Add Test References</div>
				<div class="panel-body">
					<?php echo Form::open(array( 'method'=>'POST')); ?>

						<div class="form-group">
						<label>Select Test:</label>
							<select name="test_id" class="select form-control" required="">
								<option></option>
								<?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($test->id); ?>"><?php echo e($test->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
			        	<div class="form-group">
			          		<label>Test Reference:</label>
				         	<select name="test_reference_ids[]" class="select2 form-control" multiple>
				            	<option></option>
				            	<?php $__currentLoopData = $test_references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					            <option value="<?php echo e($test_reference->id); ?>"><?php echo e($test_reference->name); ?></option>
					            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </select>
				        </div>
				        <button class="btn-sm btn-success">Add</button>
				        <input type="reset" value="Reset" class="btn-sm btn-default">
				    <?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

 $(document).on('click', '#delete_test_reference', function() 
    {
    	var test_id = $(this).data('id');
    	var test_reference_id = $(this).data('id2')
    	$('#delete_id').val(id);
    	$('#test_reference_delete').modal('show');
    });

    $('#test_reference_table').DataTable();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>