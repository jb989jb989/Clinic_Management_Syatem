<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">MIcrobiology Test</li>
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
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Microbiology Test</div>
					<div class="panel-body">
						<table class="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
				        <th>Name</th>
				        <th>Antibiotics</th>
					    </tr>
					</thead>
					<tbody>
				    <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					    	<td><?php echo e($test->name); ?></td>
					    	<td>
					    		<?php if(count($test->test_antibiotics)): ?>
					    		<?php $__currentLoopData = $test->test_antibiotics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_antibiotic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    		<?php echo e($test_antibiotic->name); ?>,
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
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Antibiotics</div>
				<div class="panel-body">
				<div class="antibiotic_add">
				<form action="<?php echo e(route('antibiotic.store')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-md" placeholder="Add new antibiotic" name="name">
							<span class="input-group-btn">
								<button class="btn btn-success btn-md" id="btn-todo">Add</button>
							</span>
						</div>
					</form>
					</div>
				<div class="antibiotic_edit" style="display: none">
				<form action="<?php echo e(route('antibiotic.edit')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="id" id="antibiotic_id">
						<div class="input-group">
							<input id="antibiotic_name" type="text" class="form-control input-md" placeholder="Add new antibiotic" name="name">
							<span class="input-group-btn">
								<button class="btn btn-success btn-md" id="btn-edit">Edit</button>
							</span>
						</div>
					</form>
					</div>
					<br>
				<table class="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    <thead>
				        <tr>

				        <th>Name</th>
				        <th>Action</th>
					    </tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $test_antibiotics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_antibiotic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($test_antibiotic->name); ?></td>
							<td>
								<button id="test_edit" class="btn-sm btn-info" data-info="<?php echo e($test_antibiotic->id); ?>, <?php echo e($test_antibiotic->name); ?>"><span class="glyphicon glyphicon-edit" ></span>
			                    </button>
			                    <button class="btn-sm btn-danger" data-test="<?php echo e($test_antibiotic->id); ?>" id="test_delete"><span class="glyphicon glyphicon-remove"></span>
			                    </button>
			                </td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
					<br>

					</div>
			</div>
		</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">Add Test Antibiotics</div>
			<div class="panel-body">
				<?php echo Form::open(array('route' => 'microbiology.store','method'=>'POST')); ?>

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
						<label>Antibiotics:</label>
						<select name="test_antibiotics_ids[]" class="select2" multiple="" style="width:100%">
							<option></option>
							<?php $__currentLoopData = $test_antibiotics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_antibiotic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($test_antibiotic->id); ?>"><?php echo e($test_antibiotic->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<button class="btn-sm btn-success">Add</button>
					<input type="reset" value="Reset" class="btn-sm btn-default">
				<?php echo e(Form::close()); ?>

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
 $(document).on('click', '.test_edit', function() {

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
     $(document).on('click', '#test_edit', function() {

        var stuff = $(this).data('info').split(',');
        fillmodal(stuff)
        $('.antibiotic_add').hide();
        $('.antibiotic_edit').show();
    });
     function fillmodal(details)
    {
        $('#antibiotic_id').val(details[0]);
        $('#antibiotic_name').val(details[1]);
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