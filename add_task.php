<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-project">

        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Task Name</label>
					<input type="text" class="form-control form-control-sm" name="task_name" value="<?php echo isset($task_name) ? $task_name : '' ?>">
				</div>
			</div>
          	<div class="col-md-6">
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" id="status" class="custom-select custom-select-sm">
						<option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>To-Do</option>
						<option value="3" <?php echo isset($status) && $status == 3 ? 'selected' : '' ?>>In-Progress</option>
						<option value="5" <?php echo isset($status) && $status == 5 ? 'selected' : '' ?>>Done</option>
                        <option value="4" <?php echo isset($status) && $status == 4 ? 'selected' : '' ?>>Review</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Start Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo isset($start_date) ? date("Y-m-d",strtotime($start_date)) : '' ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">End Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?php echo isset($end_date) ? date("Y-m-d",strtotime($end_date)) : '' ?>">
            </div>
          </div>
		  <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Actual Start Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="actual_start_date" value="<?php echo isset($actual_start_date) ? date("Y-m-d",strtotime($actual_start_date)) : '' ?>">
            </div>
          </div>
			<div class="col-md-6">
             <div class="form-group">
              <label for="" class="control-label">Actual End Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="actual_end_date" value="<?php echo isset($actual_end_date) ? date("Y-m-d",strtotime($actual_end_date)) : '' ?>">
            </div>
		 </div>
         <div class="col-md-6">
				<div class="form-group">
                <label for="">Assign To</label>
                    <?php
                    $s=$conn->query("SELECT * FROM users");
                    ?>
                    <select name="assign_to" id="assign_to" class="custom-select custom-select-sm">
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                            <option><?php echo $r['firstname']; ?></option>

                            <?php
                        }
                        ?>
                        </select>					
				</div>
			</div>
		 <div class="col-md-6">
             <div class="form-group">
              <label for="" class="control-label">Comments</label>
			  <textarea name="comment" class="form-control form-control-sm" id="comment" style="font-family:sans-serif;font-size:1.2em;">
              <?php echo isset($comment) ? $comment : '' ?> 
            </textarea>
             </div>
            </div>
			<div class="col-md-10">
				<div class="form-group">
					<label for="" class="control-label">Description</label>
					<textarea name="description" class="form-control form-control-sm" id="description" style="font-family:sans-serif;font-size:1.2em;">
						<?php echo isset($description) ? $description : '' ?>
					</textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label"> Document</label><br>
					<input type="file" name="document" value = "<?php echo isset($document) ? $document: ''?>"><br><br>
					<!-- <input type="file" class="form-control form-control-sm" name="file" value="<?php echo isset($name) ? $name : '' ?>"> -->
                </div>
            </div>
             <!-- <div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=task_list'">Cancel</button>
				</div>  -->
    	<div class="col-lg-12 text-right justify-content-center d-flex">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-project">Save</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=task_list'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>
	$('#manage-project').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_project',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
						location.href = 'index.php?page=task_list'
					},2000)
				}
			}
		})
	})
</script>