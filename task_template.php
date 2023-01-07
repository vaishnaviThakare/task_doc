<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-task">

            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="row">
              <div class="col-md-6  ">
				<div class="form-group ">
                <label for="">Task Category</label>
                <?php
                    $s=$conn->query("SELECT DISTINCT task_cat FROM template");
                    ?>
                    <select name="task_cat" id="task_cat" class="custom-select custom-select-sm" >
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                           <option>Select</option>
                            <option><?php echo $r['task_cat']; ?></option>
                            <?php
                        }
                        ?>
                        </select>					
				</div>
			  </div>
 
              <div class="col-md-6">
				<div class="form-group">
                <label for="">Academic Year</label> 
                     <?php
                    $s=$conn->query("SELECT * FROM semester");
                    ?>
                    <select name="academic_year" id="academic_year" class="custom-select custom-select-sm" >
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                            <option>Select</option>
                            <option><?php echo $r['academic_year']; ?> </option>

                            <?php
                        }
                        ?>
                        </select>			
                </div>
			</div>  


      <div class="col-md-6">
				<div class="form-group">
                <label for="">Semester Number</label> 
                     <?php
                    $s=$conn->query("SELECT * FROM semester");
                    ?>
                    <select name="semester_number" id="semester_number" class="custom-select custom-select-sm" >
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                            <option>Select</option>
                            <option><?php echo $r['semester_number']; ?> </option>

                            <?php
                        }
                        ?>
                        </select>			
                </div>
			</div>  

            <div class="col-md-6">
				<div class="form-group">
                <label for="">Template Name</label>
                    <?php
                    $s=$conn->query("SELECT DISTINCT temp_name FROM template");
                    ?>
                    <select name="temp_name" id="temp_name" class="custom-select custom-select-sm">
                    <option>Select</option>
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                            
                            <option><?php echo $r['temp_name']; ?></option>
                            <?php
                        }
                        ?>
                        </select>					
				</div>
			</div>
            <div class="col-md-6">
				<div class="form-group">
                <label for="">Task Name</label>
                    <?php
                    $s=$conn->query("SELECT * FROM template");
                    ?>
                    <select name="title" id="title" class="custom-select custom-select-sm">
                    <option>Select</option>
                        <?php
                        
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                           
                            <option><?php echo $r['title']; ?></option>

                            <?php
                        }
                        ?>
                        </select>					
				            </div>
                  </div>
                  <div class="col-md-6">
				<div class="form-group">
					<label for="">Reccuring Duration</label>
					<select name="reccuring" id="reccuring" class="custom-select custom-select-sm">
                    <option>Select</option>
						<option value="0" <?php echo isset($reccuring) && $reccuring == 0 ? 'selected' : '' ?>>0</option>
						<option value="15" <?php echo isset($reccuring) && $reccuring == 15 ? 'selected' : '' ?>>15</option>
						<option value="30" <?php echo isset($reccuring) && $reccuring == 30 ? 'selected' : '' ?>>30</option>
                        <option value="45" <?php echo isset($reccuring) && $reccuring == 45 ? 'selected' : '' ?>>45</option>
					</select>
				</div>
			</div> 
            </div>
            
            <div class="row">
			
          	<div class="col-md-6">
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" id="status" class="custom-select custom-select-sm">
                    <option>Select</option>
						<option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>To-Do</option>
						<option value="2" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>In-Progress</option>
						<option value="3" <?php echo isset($status) && $status == 3 ? 'selected' : '' ?>>Done</option>
                        <option value="4" <?php echo isset($status) && $status == 4 ? 'selected' : '' ?>>Review</option>
					</select>
				</div>
			</div>
		
        <div class="col-md-6">
				<div class="form-group">
                <label for="">Assign To</label>
                    <?php
                    $s=$conn->query("SELECT * FROM users");
                    ?>
                    <select name="assign_to" id="assign_to" class="custom-select custom-select-sm">
                    <option>Select</option>
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                           
                            <option><?php echo $r['firstname']; ?>  <?php echo $r['lastname']; ?></option>

                            <?php
                        }
                        ?>
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
					<label for="" class="control-label">Description</label>
					<textarea name="description" class="form-control form-control-sm" id="description" style="font-family:sans-serif;font-size:1.2em;">
						<?php echo isset($description) ? $description : '' ?>
					</textarea>
				</div>
			</div>
    	<div class="col-lg-12 text-right justify-content-center d-flex">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-task">Save</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=task_list'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>
    

	$('#manage-task').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_task',
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