<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Immunology Test</li>
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
					<div class="panel-heading">Immunology Test</div>
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
					    	<td><?php if(count($test->test_references)): ?> <?php $__currentLoopData = $test->test_references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
					<?php echo Form::open(array('method'=>'POST')); ?>

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
				         	<select name="test_reference_ids[]" class="select2 form-control" multiple="">
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

<div class="col-md-4" style="display: none" id="edit_test_reference">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Test References</div>
				<div class="panel-body">
					<?php echo Form::open(array('route' => 'reference.update','method'=>'POST')); ?>

				      	<div class="form-group">
						    <label>Name:</label>
					 	    <?php echo Form::text('name', null, array('class' => 'form-control', 'required'=>'required', 'id' =>'test_reference_name')); ?>

					    </div>
			    		<div class="form-group">
			    			<label>Unit:</label>
			    			<?php echo Form::text('unit', null, array('class' => 'form-control', 'placeholder'=>'mg/dl', 'id' => 'test_reference_unit')); ?>

			    		</div>
			    		<div class="form-group">
			    			<label>Ref Range:</label>
			    			<?php echo Form::text('range', null, array('class' => 'form-control', 'placeholder'=>'0 - 40', 'id'=>'test_reference_range')); ?>

			    		</div>
			        	<div class="form-group">
			          		<label>Parent Test:</label>
				         	<select name="parent_id" class="form-control" id='test_parent_id'>
				            	<?php $__currentLoopData = $test_references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					            <option value="<?php echo e($test_reference->id); ?>"><?php echo e($test_reference->name); ?></option>
					            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </select>
				        </div>
				        <button class="btn-sm btn-success">Edit</button>
				        <input type="reset" value="Cancel" class="btn-sm btn-default" id="cancel">
				    <?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="test_reference_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete test_reference</h4>
      </div>
      <?php echo Form::open(array('route' => 'reference.delete','method'=>'POST')); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="delete_id">
      	<label>Are your sure want to delete this test_reference?</label>
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button"><span class='glyphicon glyphicon-remove'></span> No</button>
           <button class="btn btn-danger" type="submit"><span class='glyphicon glyphicon-ok'></span> Yes</button>
    </div>
    <?php echo e(Form::close()); ?>

  </div>
</div>
</div>
<script type="text/javascript">
  $('#cancel').click(function(){
	 	$('.edit').hide();
        $('.add').show();
})
 $(document).on('click', '.edit-modal', function() {
        
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#edittest_reference').modal('show');
    });

   function fillmodalData(details)
    {
        $('#id').val(details[0]);
        $('#name').val(details[1]);
        $('#unit').val(details[2]);
        $('#ref_range').val(details[3]);   
    }
     $(document).on('click', '.edit-test_reference', function() {
        
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodal(stuff)
        $('#edittest_reference').modal('show');
    });
     function fillmodal(details)
    {
        $('#id_test_reference').val(details[0]);
        $('#test_reference_name').val(details[1]);
    }
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