<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-project">

        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="row">

		<div class="col-md-6">
				<div class="form-group">
					<label for="">Semester</label>
					<select name="semester" id="semester" class="custom-select custom-select-sm">
                        <option>Select</option>
						<option value="1" <?php echo isset($semester) && $semester == 1 ? 'selected' : '' ?>>Even</option>
						<option value="2" <?php echo isset($semester) && $semester == 2 ? 'selected' : '' ?>>Odd</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="">Semester Number</label>
					<select name="semester_number" id="semester_number" class="custom-select custom-select-sm">
					<!-- <?php 
        	if(isset($_POST['save_project'])){
				$semester_number = $_POST['semester_number'];
				$duplicate=mysqli_query($conn,"select * from semester where semester_number='$semester_number'");
                if(mysqli_num_rows($duplicate)>0){
	             header("Location: index.php?message=semester already exists.");
                }
                 else{

                  }
		      	}
        	     ?> -->
				 <option>select</option>
                        <option value="1" <?php echo isset($semester_number) && $semester_number == 1 ? 'selected' : '' ?>>2</option>
						<option value="2" <?php echo isset($semester_number) && $semester_number == 2 ? 'selected' : '' ?>>4</option>
					    <option value="3" <?php echo isset($semester_number) && $semester_number == 3 ? 'selected' : '' ?>>6</option>
						<option value="4" <?php echo isset($semester_number) && $semester_number == 4 ? 'selected' : '' ?>>8</option>
                       <option value="1" <?php echo isset($semester_number) && $semester_number == 1 ? 'selected' : '' ?>>1</option>
						<option value="2" <?php echo isset($semester_number) && $semester_number == 2 ? 'selected' : '' ?>>3</option>
					    <option value="3" <?php echo isset($semester_number) && $semester_number == 3 ? 'selected' : '' ?>>5</option>
						<option value="4" <?php echo isset($semester_number) && $semester_number == 4 ? 'selected' : '' ?>>7</option>
                    </select>
					<!-- <label for="" class="control-label">Semester Number</label>
					<input type="text" class="form-control form-control-sm" name="semester_number" value="<?php echo isset($semester_number) ? $semester_number : '' ?>"> -->
					
					
				</div>
			</div>
          	<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Academic Year</label>
					<input type="text" class="form-control form-control-sm" name ="academic_year" value="<?php echo isset($academic_year) ? $academic_year : '' ?>">
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
		</div>
        </form>
        </div>
		
    	<div class="col-lg-12 text-right justify-content-center d-flex">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-project">Save</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=manage_semester'">Cancel</button>
				<br><br><br><br>
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
						location.href = 'index.php?page=manage_semester'
					},2000)
				}
			}
		})
	})
</script>