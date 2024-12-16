<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Manage Test</li>
			</ol>
		</div><br><!--/.row-->
<!-- Modal -->
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-block">
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
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Manage Test</div>
					<div class="panel-body">
					
					<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
				    	<thead>
				        <tr>
			            	<th>ID</th>
					        <th>Name</th>
					        <th>Type</th>
					        <td>Description</td>
					        <th>Action</th>
						    </tr>
						</thead>
						    <tbody>
						     <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    	<tr>
							    	<td><?php echo e($test->id); ?></td>
							    	<td><?php echo e($test->name); ?></td>
							    	<td><?php echo e(ucfirst($test->report_type)); ?></td>
							    	<td><?php echo e($test->description); ?></td>
					           		<td>
			                           	<button id="test_edit" class="btn-sm btn-info" data-info="<?php echo e($test->id); ?>, <?php echo e($test->name); ?>,<?php echo e($test->report_type); ?>, <?php echo e($test->description); ?>">
			                           		<span class="glyphicon glyphicon-edit" ></span>
			                            </button>
			                            <button class="btn-sm btn-danger" data-test="<?php echo e($test->id); ?>" id="test_delete">	<span class="glyphicon glyphicon-remove"></span>
			                            </button>
	                            	</td>
				        		</tr>
				    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
					</table>
					
					</div>
				</div>
			</div>
			<div class="col-md-3 add">
			<div class="panel panel-default">
				<div class="panel-heading">Add New Test</div>
				<div class="panel-body">
				<?php echo Form::open(array('route' => 'test.store','method'=>'POST')); ?>

				<div class="form-group">
		      	<label>Select Services:</label>
			        <select name="service_id" class="form-control select" required="" style="width:100%" id="service">
			        <option></option>
			            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                <option value="<?php echo e($service->id); ?>" data-name="<?php echo e($service->name); ?>"><?php echo e($service->name); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </select>
			    </div>
			    <div class=" form-group">
					<label>Test Name:</label>
				 	<?php echo Form::text('name', null, array('class' => 'form-control', 'id' => 'test_name')); ?>

				</div>
				<div class="form-group">
				<label>Report Type:</label>
					<select class="form-control" name="report_type" required="">
					<option></option>
						<option value="haematology">HAEMATOLOGY</option>
						<option value="biochemistry">BIOCHEMISTRY</option>
						<option value="immunology">IMMUNOLOGY</option>
						<option value="examination">EXAMINATION</option>
						<option value="microbiology">MICROBIOLOGY</option>
						<option value="stain">STAIN</option>
						<<option value="widal">WIDAL</option>}
						option
					</select>
				</div>
				<div class="form-group">
					<label>Description:</label>
				 	<?php echo Form::text('description', null, array('class' => 'form-control')); ?>

				</div>
			    </div>
			    <div class="panel-footer">
				<button class="btn btn-primary" type="submit"><span class='glyphicon glyphicon-edit'></span>Add</button>
				<button class="btn btn-default pull-right" type="reset">Reset</button>
           		</div>
           		<?php echo Form::close(); ?>

			</div>
		</div>
		<!-- Edit Test -->
		<div class="col-md-3 edit" style="display: none">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Test</div>
				<div class="panel-body">
				<?php echo Form::open(array('route' => 'test.edit','method'=>'POST' )); ?>

				<input name="id" type="name" class="hidden form-control" id="id" >
			    <div class=" form-group">
					<label>Test Name:</label>
				 	<?php echo Form::text('name', null, array('class' => ' form-control', 'required'=>'required', 'id'=>'name')); ?>

				</div>
				<div class="form-group">
				<label>Report Type:</label>
					<select class="form-control" name="report_type" id="report_type">
						<option value="haematology">HAEMATOLOGY</option>
						<option value="biochemistry">BIOCHEMISTRY</option>
						<option value="immunology">IMMUNOLOGY</option>
						<option value="examination">EXAMINATION</option>
						<option value="microbiology">MICROBIOLOGY</option>
						<option value="stain">STAIN</option>
						<<option value="widal">WIDAL</option>}
						option
						
					</select>
				</div>
				<div class="form-group">
					<label>Description:</label>
				 	<?php echo Form::text('description', null, array('class' => 'form-control', 'id'=>'description')); ?>

				</div>
				
				<div class="panel-footer">
					<button class="btn btn-primary" type="submit"><span class='glyphicon glyphicon-edit'></span>Edit</button>
					<a class="btn btn-default pull-right" id="cancel">Cancel</a>
           		</div>
           		<?php echo Form::close(); ?>

			</div>
		</div>
</div>

</div><!--/.row-->	
<div class="modal fade" id="deletetest"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Test</h4>
      </div>
      <?php echo Form::open(array('route' => 'test.delete','method'=>'POST')); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="test_id">
      	<label>Are your sure want to Delete this test?</label>
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
$('#service').on('change', function() {
	
	var test_name = $("#service option:selected").text();
	$('#test_name').val(test_name);
});

$('#cancel').click(function(){
	 	$('.edit').hide();
        $('.add').show();
});
  
 $(document).on('click', '#test_edit', function() {
 		
        var stuff = $(this).data('info').split(',');
        $('.add').hide();
 		$('.edit').show();
 		fillmodalData(stuff)
        
    });

   function fillmodalData(details)
    {
        $('#id').val(details[0]);
        $('#name').val(details[1]);
        $('#report_type').val(details[2]);
       	$('#description').val(details[3]);
        
    }

    $(document).on('click', '#test_delete', function() 
    {
    	var id = $(this).data('test');
    	$('#test_id').val(id);
    	$('#deletetest').modal('show');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>