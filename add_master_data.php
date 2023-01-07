<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="master_data">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Task Category</label>
							<input type="text" name="task_cat" class="form-control form-control-sm" required value="<?php echo isset($task_cat) ? $task_cat : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Template Name</label>
							<input type="text" name="temp_name" class="form-control form-control-sm" required value="<?php echo isset($temp_name) ? $temp_name : '' ?>">
						</div>
												
						<div class="form-group">
							<label class="control-label">Task Name</label>
							<input type="text" class="form-control form-control-sm" name="title" required value="<?php echo isset($title) ? $title : '' ?>">
							
						</div>
						
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
				<div class="d-flex w-100 justify-content-center align-items-center">
				<button class="btn btn-flat  bg-gradient-primary mx-2" form="master_data">Save</button>
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href = 'index.php?page=manage_master_data'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
		$('#master_data').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		
		$.ajax({
			url:'ajax.php?action=save_mdata',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=manage_master_data')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>