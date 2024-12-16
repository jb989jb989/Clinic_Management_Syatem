<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Stain Test</li>
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
					<div class="panel-heading">Stain Test</div>
					<div class="panel-body">
						<table class="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
				        <th>Name</th>
				        <th>Tests</th>
				        <th>Action</th>
					    </tr>
					</thead>
					<tbody>
				    <?php $__currentLoopData = $test_stains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_stain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					    	<td><?php echo e($test_stain->test->name); ?></td>
					    	<td>
					    		<?php $__currentLoopData = $test_stain->test_name(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    		<li><?php echo e($test_name); ?></li>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    	</td>
					    	<td>
								<button class="btn-sm btn-info edit_test_stain" data-test="<?php echo e(json_encode($test_stain->test_name())); ?>" data-id="<?php echo e($test_stain->id); ?>" data-test_id = "<?php echo e($test_stain->test_id); ?>"><span class="glyphicon glyphicon-edit" ></span>
			                    </button>
			                    <button class="btn-sm btn-danger" data-test="<?php echo e($test_stain->id); ?>" id="test_delete"><span class="glyphicon glyphicon-remove"></span>
			                    </button>
			                </td></td>
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
					</table>
				</div>
			</div>
	</div>
	<div class="col-md-4" id="add_test_stain">
		<div class="panel panel-default">
			<div class="panel-heading">Add Test stain</div>
				<div class="panel-body">
					<?php echo Form::open(array('route' => 'stain.store','method'=>'POST')); ?>

						<div class="form-group">
						<label>Select Test:</label>
							<select name="test_id" class="form-control" required="">
								<option></option>
								<?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($test->id); ?>"><?php echo e($test->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="form-group">
					    <label>Test Name:</label>
						<table class="add_test" width="100%">
							<tr class="add_more_test">
								<td>
									<input type="text" class="form-control input-md" placeholder="Add new test" name="test_name[]">
						        </td>
						    </tr>
						</table><br>
						<a class="btn btn-primary btn-md add_more_tests">Add More</a>
						</div>
						<div class="panel-footer">
					        <button class="btn-sm btn-primary">Add</button>
					        <button class="btn-sm btn-default cancel" type="reset">Reset</button>
					    </div>
				    <?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
		<div class="col-md-4" style="display: none" id="edit_test_stain">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Test Stain</div>
				<div class="panel-body">
					<?php echo Form::open(array('route' => 'stain.edit','method'=>'POST')); ?>

					<input type="hidden" name="id" id="id_test_stain">
				      	<div class="form-group">
						<label>Test Name:</label>
							<select name="test_id" class="form-control" id="test_stain_id">
							<option></option>
								<?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($test->id); ?>"><?php echo e($test->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
			        	<div class="form-group">
						    <label>Tests:</label>
							<table class="add_test" width="100%">
								 <tr class="add_more_test">
								 </tr>
							</table>
						</div>
						<br>
						<a class="btn btn-primary btn-md add_more_tests">Add More</a>
					</div>
					<div class="panel-footer">
				        <button class="btn-sm btn-primary">Edit</button>
				        <button type="reset" class="btn-sm btn-default cancel">Reset</button>
				    </div>
				    <?php echo e(Form::close()); ?>

				</div>
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

  $('.cancel').click(function(){
	 	$('#edit_test_stain').hide();
        $('#add_test_stain').show();
        $('input').val('');
       	$(this).find('add_more_tests').remove();

});
   $('#test_edit').click(function(){
	 	$('#edit_test_stain').hide();
        $('#add_test_stain').show();
        $('input').val('');
});

   $('#remove_test').click(function(){
	 	
        $(this).parentsUntil('.add_test').remove();
});


     $(document).on('click', '.edit_test_stain', function() {

     	$('.add_test').empty();
        var stain_id = $(this).data('id');
        var test_id = $(this).data('test_id');
        var test = $(this).data('test');

        	for (i = 0; i < test.length; i++) { 
        		$('.add_test').append("<tr class='add_more_test'><td><div class='input-group'><input type='text' name='test_name[]' value='"+ test[i] +"' class='form-control input-md' required=''><span class='input-group-btn'><a class='btn btn-sm btn-danger remove'><span class='glyphicon glyphicon-remove'></span></a></span></div></td></tr>");
        		
        	}

    	$('.add_test .remove').on('click', function() {
    	$(this).parent().parent().remove();
        });
        $('#id_test_stain').val(stain_id);
        $('#test_stain_id').val(test_id);

        $('#edit_test_stain').show();
        $('#add_test_stain').hide();

    });
     $(document).on('click', '#delete_test_stain', function()
    {
    	var test_id = $(this).data('id');
    	var test_reference_id = $(this).data('id2')
    	$('#delete_id').val(id);
    	$('#test_reference_delete').modal('show');
    });

     $('#test_reference_table').DataTable();

     $('.add_more_tests').on('click', function(e) {
     	  e.preventDefault();
            newTestsItem();
     });
     function newTestsItem() {
            var newElem = $('tr.add_more_test').first().clone();
            newElem.find('input').val('');
            newElem.appendTo('.add_test');
        }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>