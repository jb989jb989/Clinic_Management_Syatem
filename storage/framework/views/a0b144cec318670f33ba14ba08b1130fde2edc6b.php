<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Examination Test</li>
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
					<div class="panel-heading">Examination Test</div>
					<div class="panel-body">
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
				        <th>ID</th>
				        <th>Name</th>
				        <th>Macroscopic</th>
				        <th>Microscopic</th>
				        <th>Action</th>
					    </tr>
					</thead>
					<tbody>
				    <?php $__currentLoopData = $test_examinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					    	<td><?php echo e($test->id); ?></td>
					    	<td><?php echo e($test->test->name); ?></td>
					    	<td>
					    		<?php $__currentLoopData = $test->macroscopic(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $macroscopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    			<li><?php echo e($macroscopic); ?></li>
					    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    	</td>
					    	<td>
					    		<?php $__currentLoopData = $test->microscopic(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $microscopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    			<li><?php echo e($microscopic); ?></li>
					    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    	</td>
					    	<td><button style="margin-right: 5px"  class="edit_test_examination btn-sm btn-info" data-info="<?php echo e($test->id); ?>,<?php echo e($test->test->id); ?>" data-microscopic="<?php echo e(json_encode($test->microscopic())); ?>" data-macroscopic="<?php echo e(json_encode($test->macroscopic())); ?>"><span class="glyphicon glyphicon-edit"></span>
	                            </button>
	                            <button class="btn-sm btn-danger" id="delete_test_reference"  data-id="<?php echo e($test->id); ?>"><span class="glyphicon glyphicon-remove "></span></button></td>
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
					</table>
				</div>
			</div>
		</div>
	<div class="col-md-4" id="add_test_examination">
		<div class="panel panel-default">
			<div class="panel-heading">Add Test Examination</div>
				<div class="panel-body">
					<?php echo Form::open(array('route' => 'examination.store','method'=>'POST')); ?>

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
					    <label>Microscopics:</label>
						<table class="add_microscopic" width="100%">
							<tr class="add_more_microscopic">
								<td>
									<input type="text" class="form-control input-md" placeholder="Add new microscopic" name="microscopic[]">
						        </td>
						    </tr>
						</table><br>
						<a class="btn btn-success btn-md add_more_microscopics">Add More</a>
						</div>
						<div class="form-group">
					    <label>Macroscopics:</label>
						<table class=" add_macroscopic" width="100%">
						    <tr class="add_more_macroscopic">
						    	<td>
						    	<input type="text" class="form-control input-md" placeholder="Add new macroscopic" name="macroscopic[]">
								</td>
							</tr>
						</table><br>
						<a class="btn btn-success btn-md add_more_macroscopics">Add More</a>
						</div>

				        <button class="btn-sm btn-success">Add</button>
				        <input type="reset" value="Reset" class="btn-sm btn-default">
				    <?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>

<div class="col-md-4" style="display: none" id="edit_test_examination">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Test References</div>
				<div class="panel-body">
					<?php echo Form::open(array('route' => 'examination.update','method'=>'POST')); ?>

					<input type="hidden" name="id" id="id_test_examination">
				      	<div class="form-group">
						<label>Test Name:</label>
							<select name="test_id" class="form-control" required="" id="test_examination_id">
								<option></option>
								<?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($test->id); ?>"><?php echo e($test->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
			        	<div class="form-group">
						    <label>Microscopics:</label>
							<table class="add_microscopic" width="100%">
								 <tr class="add_more_microscopic">
								 </tr>
							</table>
						</div>
						<br>
						<a class="btn btn-success btn-md add_more_microscopics">Add More</a>

						<div class="form-group">
						    <label>Macroscopics:</label>
							<table class="add_macroscopic" width="100%">
							 	 <tr class="add_more_macroscopic">
								 </tr>
							</table>
						</div><br>
							<a class="btn btn-success btn-md add_more_macroscopics">Add More</a>
					</div>
					<div class="panel-footer">
				        <button class="btn-sm btn-success">Edit</button>
				        <input type="reset" value="Cancel" class="btn-sm btn-default cancel">
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
  		location.reload();
	 	$('#edit_test_examination').hide();
        $('#add_test_examination').show();
        $('input').val('');
})
$('a .remove_micro').on('click', function(e) {
	alert('hh');
		// $(this).parent().parent().remove();
});
$('.add_macroscopic .remove_macro').on('click', function(e) {
	alert('hh');
		// $(this).parent().parent().remove();
});

     $(document).on('click', '.edit_test_examination', function() {
        var stuff = $(this).data('info').split(',');
        var microscopic = $(this).data('microscopic');
        var macroscopic = $(this).data('macroscopic');

        	for (i = 0; i < microscopic.length; i++) { 
        		$('.add_microscopic').append("<tr class='add_more_microscopic'><td><div class='input-group'><input type='text' name='microscopic[]' value='"+ microscopic[i] +"' class='form-control input-md' required=''><span class='input-group-btn'><a class='btn btn-sm btn-danger remove_micro'><span class='glyphicon glyphicon-remove'></span></a></span></td></tr>");
        	}

        	for (i = 0; i < macroscopic.length; i++) {
        		$('.add_macroscopic').append("<tr class='add_more_macroscopic'><td><div class='input-group'><input type='text' name='macroscopic[]' value='"+ macroscopic[i] + "' class='form-control' required=''><span class='input-group-btn'><a class='btn btn-sm btn-danger remove_macro'><span class='glyphicon glyphicon-remove'></span></a></span></td></tr>");
			}
        $('#id_test_examination').val(stuff[0]);
        $('#test_examination_id').val(stuff[1]);

        $('#edit_test_examination').show();
        $('#add_test_examination').hide();

        $('.add_microscopic .remove_micro').on('click', function() {
        	$(this).parent().parent().remove();
        });

         $('.add_macroscopic .remove_macro').on('click', function() {
        	$(this).parent().parent().remove();
        })


    });
     $(document).on('click', '#delete_test_reference', function()
    {
    	var test_id = $(this).data('id');
    	var test_reference_id = $(this).data('id2')
    	$('#delete_id').val(id);
    	$('#test_reference_delete').modal('show');
    });

     $('#test_reference_table').DataTable();

     $('.add_more_macroscopics').on('click', function(e) {
     	  e.preventDefault();
            newMacroItem();
     });
     function newMacroItem() {
            var newElem = $('tr.add_more_macroscopic').first().clone();
            newElem.find('input').val('');
            newElem.appendTo('.add_macroscopic');
        }
     $('.add_more_microscopics').on('click', function(e) {
     	  e.preventDefault();
            newMicroItem();
     });
     function newMicroItem() {
            var newElem = $('tr.add_more_microscopic').first().clone();
            newElem.find('input').val('');
            newElem.appendTo('.add_microscopic');
        }


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>