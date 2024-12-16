<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>'
				<li>Package</li>
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
					<div class="panel-heading">Package Table<a class="btn btn-sm btn-primary pull-right" href="<?php echo e(url('/')); ?>">
					Back <span class="glyphicon glyphicon-share-alt"></span></a></div>
					<div class="panel-body">
					<?php if($packages->count()): ?>
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
						<thead>
				        <tr>
				           <th>S.n</th>
						   <th>Package Name</th>
						   <th>Tests</th>
						   <th>Price</th>
						   <th>Action</th>
				            
				        </tr>
				    	</thead>
				    	<tbody>

						<?php $i=1;?>
						<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
								<td><?php echo e($i++); ?></td>
								<td><?php echo e($package->name); ?></td>
								<td>
						    		<?php $__currentLoopData = $package->packageTests()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package_test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    			<li><?php echo e($package_test->test->name); ?><a class="btn-sm" id="test_delete" data-id="<?php echo e($package_test->id); ?>"><span class="glyphicon glyphicon-remove"></span></a></li>
						    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    	</td> 
						    	<td>$<?php echo e($package->price); ?></td>	
								<td>
                           <button id="package_edit" class="btn-sm btn-info" data-edit="<?php echo e($package->id); ?>, <?php echo e($package->name); ?>, <?php echo e($package->description); ?>, <?php echo e($package->price); ?>, <?php echo e($package->status); ?>"><span class="glyphicon glyphicon-edit" ></span>
                            </button>

                             <button class="btn-sm btn-danger" data-package="<?php echo e($package->id); ?>" id="package_delete"><span class="glyphicon glyphicon-remove"></span></button>
                            </td>
							</tr>
						     </td>
				        </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
					</table>
					<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="col-md-4 add">
			<div class="panel panel-default">
				<div class="panel-heading">Add New Package</div>
				<div class="panel-body">
				<?php echo Form::open(array('route' => 'package.store','method'=>'POST')); ?>

			    <div class=" form-group">
					<label>Package Name:</label>
				 	<?php echo Form::text('name', null, array('class' => 'form-control')); ?>

				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" name="description" class="form-control">
				</div>
				<div class="form-group">
		      	<label>Select Tests:</label>
			        <select name="test_id[]" class="form-control select" required style="width:100%" multiple="">
			        <option></option>
			            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                <option value="<?php echo e($test->id); ?>" data-name="<?php echo e($test->name); ?>"><?php echo e($test->name); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </select>
			    </div>
			    <div class="form-group">
			    	<label>Price:</label>
			    	<input type="text" name="price" class="form-control" required="">
			    </div>
			     <div class="form-group">
	    	<label for="with_tax">With Tax</label>
	    	<input type="checkbox" name="with_tax" id="with_tax" >
	    </div>
			    </div>
			    <div class="panel-footer">
				<button class="btn btn-success" type="submit"><span class='glyphicon glyphicon-edit'></span>Add</button>
				<button class="btn btn-default pull-right" type="reset">Reset</button>
           		</div>
           		<?php echo Form::close(); ?>

			</div>
		</div>
		<!-- Edit Test -->
		<div class="col-md-4 edit" style="display: none">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Packakge</div>
				<div class="panel-body">
				<?php echo Form::open(array('route' => 'package.edit','method'=>'POST' )); ?>

				
				<input name="id" type="name" class="hidden form-control" id="id" >
			    <div class=" form-group">
					<label>Package Name:</label>
				 	<?php echo Form::text('name', null, array('class' => ' form-control',  'id'=>'name')); ?>

				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" name="description" class="form-control" id="description">
				</div>
			    <div class="form-group">
			    	<label>Price:</label>
			    	<input type="text" name="price" class="form-control"  id="price">
			    </div>
			
				<div class="form-group">
				<label>Add Tests:</label>
			        <select name="test_id[]" class="form-control select" style="width:100%"  multiple>
			       
			            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                <option value="<?php echo e($test->id); ?>" data-name="<?php echo e($test->name); ?>"><?php echo e($test->name); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        
			        </select>
			    </div> 
			     <div class="form-group">
			    	<label for="with_tax">With Tax</label>
			    	<input type="checkbox" name="with_tax" id="with_tax" >
			    </div>
			    </div>
				<div class="panel-footer">
					<button class="btn btn-success" type="submit"><span class='glyphicon glyphicon-edit'></span>Edit</button>
					<a class="btn btn-default pull-right" id="cancel">Cancel</a>
           		</div>
           		
           		<?php echo Form::close(); ?>

			</div>
		</div>
</div>
			
<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Test</h4>
      </div>
      <?php echo Form::open(array('route' => 'package.test.delete','method'=>'POST')); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="delete_id">
      	<label>Are your sure want to delete this test test?</label>
      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button"><span class='glyphicon glyphicon-remove'></span> No</button>
           <button class="btn btn-danger" type="submit"><span class='glyphicon glyphicon-ok'></span> Yes</button>
    </div>
    <?php echo e(Form::close()); ?>

  </div>
</div>
</div>

<div class="modal fade" id="deletePackage"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Package</h4>
      </div>
      <?php echo Form::open(array('route' => 'package.delete','method'=>'POST')); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="package_id">
      	<label>Are your sure want to delete this pacakge?</label>
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
});
  
 $(document).on('click', '#package_edit', function() {
 		
        var stuff = $(this).data('edit').split(',');
        fillmodalData(stuff)
        $('.add').hide();
        $('.edit').show();
        
    });

   function fillmodalData(details)
    {
        $('#id').val(details[0]);
        $('#name').val(details[1]);
        $('#description').val(details[2]);
        $('#price').val(details[3]);
        
    }
     $(document).on('click', '#test_delete', function() 
    {
    	var id = $(this).data('id');
    	$('#delete_id').val(id);
    	$('#delete').modal('show');
    });

    $(document).on('click', '#package_delete', function() 
    {
    	var id = $(this).data('package');
    	$('#package_id').val(id);
    	$('#deletePackage').modal('show');
    });

</script>
<?php $__env->stopSection(); ?>
		
				    	
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>