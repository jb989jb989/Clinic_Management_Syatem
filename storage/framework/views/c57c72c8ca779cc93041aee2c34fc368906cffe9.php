<!-- Edit Modal -->
<div class="modal fade" id="edit_report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Report </h4>
      </div>
		<div class="modal-body">
		<?php echo Form::open(array('route' => 'report.update','method'=>'POST' )); ?>


		<div class="form-group">
		<div class="edit_report">
		</div>
      	</div>
      	</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success edit" >
					<span id="footer_action_button" class='glyphicon glyphicon-check'> Update</span>
				</button>
				
				<button type="button" class="btn btn-warning" data-dismiss="modal">
					<span class='glyphicon glyphicon-remove'></span> Close
				</button>
			</div>
			<?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
	
	