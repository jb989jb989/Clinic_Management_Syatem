<?php $__env->startSection('content'); ?>
<div class="col-md-12 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>'
				<li>Services</li>
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
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Service Table<a class="btn btn-sm btn-primary pull-right" href="<?php echo e(url('/')); ?>">Back <span class="glyphicon glyphicon-share-alt"></span></a></div>
					<div class="panel-body">
						<table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
						<thead>
				        <tr>
				            <th >ID</th>
				            <th >Service</th>
				            <th >Department</th>
				            <th>Amount</th>
				            <th >Actions</th>
				            
				        </tr>
				    	</thead>
				    	<tbody>
				    	<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr class="sevice<?php echo e($service->id); ?>">
				            <td><?php echo e($service->id); ?></td>
				            <td><?php echo e($service->name); ?></td>
				            <td><?php echo e($service->department->name); ?></td>
				            <td><?php echo e(number_format($service->amount, 2)); ?></td>
				           <td>
                           <button style="margin-right: 5px" class="btn-sm btn-info edit_service" data-info="<?php echo e($service->id); ?>,<?php echo e($service->name); ?>,<?php echo e($service->amount); ?>,<?php echo e($service->department_id); ?>"><span class="glyphicon glyphicon-edit"></span>
                            </button>
                            <button class="btn-sm btn-danger" id="delete_service"  data-id="<?php echo e($service->id); ?>"><span class="glyphicon glyphicon-remove "></span></button>
                            </td>
				        </tr>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    	</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4 add">
			<div class="panel panel-default">
				<div class="panel-heading">Add Service</div>
				<div class="panel-body">
				 <?php echo Form::open(array('route' => 'service.add','method'=>'POST')); ?>

				 <div class="form-group">
			<label>Service Name:</label>
		 	<?php echo Form::text('name', null, array('class' => 'form-control', 'required'=>'required')); ?>

		</div>
		<div class="form-group">
			<label>Service Amount:</label>
		 	<?php echo Form::text('amount' ,null, array('class' => 'form-control', 'required'=>'required')); ?>

		</div>
		<div class="form-group">
	        <label>Department:</label>
	        <select name="department_id" class="form-control" required>
	        <option></option>
	            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </select>
	    </div>
	    <div class="form-group">
	    	<label for="with_tax">With Tax</label>
	    	<input type="checkbox" name="with_tax" id="with_tax" checked="">
	    </div>

		</div>
		<div class="panel-footer">
		
   		<button class="btn btn-success" type="submit"><span class='glyphicon glyphicon-plus'></span>Add</button>
   		<button class="btn pull-right" type="reset">Reset</button>
   		</div>
   		<?php echo Form::close(); ?>

   		</div>
				
		</div>

		<div class="col-md-4 edit" style="display: none">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Service</div>
			<div class="panel-body">
			<?php echo Form::open(array('route' => 'service.edit','method'=>'POST' )); ?>

			<input name="id" type="name" class="hidden form-control" id="id" >
			<div class="form-group">
				<label>Service Name:</label>
		 		<?php echo Form::text('name', null, array('class' => 'form-control', 'required'=>'required', 'id'=>'name')); ?>

			</div>
			<div class="form-group">
				<label>Service Amount:</label>
				<input type="text" name="amount" id="amount" required class="form-control">
			</div>
			<div class="form-group">
		        <label>Department:</label>
		        <select name="department_id" class="form-control" id="department_id">
		        <option id="department_id" value=""></option>
		            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        </select>
		    </div>

		    <div class="form-group">
		    	<label for="with_tax">With Tax</label>
		    	<input type="checkbox" name="with_tax" id="with_tax" checked="">
	    	</div>
			</div>
				<div class="panel-footer">
				<a class="btn btn-danger pull-right" id="cancel" >Cancel</a>
           		<button class="btn btn-success" type="submit"><span class='glyphicon glyphicon-edit'></span>Edit</button>
           		</div>
           		<?php echo Form::close(); ?>

        </div>
				
		</div>

		</div><!--/.row-->	
</div><!--/.main-->
<div class="modal fade" id="user_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Service</h4>
      </div>
      <?php echo Form::open(array('route' => 'service.delete','method'=>'POST')); ?>

      <div class="modal-body">
      <input type="hidden" name="id" id="delete_id">
      	<label>Are your sure want to delete this service?</label>
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
	$(document).on('click', '.edit_service', function() {
        
        $('.add').hide();
        $('.edit').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
    });

   function fillmodalData(details)
    {
        $('#id').val(details[0]);
        $('#name').val(details[1]);

        var amount = details[2];
        var tax = <?php echo e($setting->tax_percent/100); ?>;
        var tax_amount = amount * tax;
        var total = parseFloat(amount) + parseFloat(tax_amount);
        total = total.toFixed();
        $('#amount').val(total);
        $('#department_id').val(details[3]);
    }

    $(document).on('click', '#delete_service', function() 
    {
    	var id = $(this).data('id');
    	$('#delete_id').val(id);
    	$('#user_delete').modal('show');
    });
     $(document).ready(function() {
    $('#dataPrint').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
          'csv',
          'print' 
        ]
    } );
} );

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>