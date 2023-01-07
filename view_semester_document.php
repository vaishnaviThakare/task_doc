<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM task_list where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12">
			<div class="callout callout-info">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-6">
	<dl>
		<dt><b class="border-bottom border-primary">Task</b></dt>
		<dd><?php echo ucwords($title) ?></dd>
	<br>
		<dt><b class="border-bottom border-primary">Academic Year</b></dt>
		<dd><?php echo ucwords($academic_year) ?></dd>
		<br>
		<dt><b class="border-bottom border-primary">Semester Number</b></dt>
		<dd><?php echo ucwords($semester_number) ?></dd>
		<br>
		<dt><b class="border-bottom border-primary">Status</b></dt>
		<dd>
			<?php 
        	if($status == 1){
		  		echo "<span class='badge badge-secondary'>Pending</span>";
        	}elseif($status == 2){
		  		echo "<span class='badge badge-primary'>On-Progress</span>";
        	}elseif($status == 3){
		  		echo "<span class='badge badge-success'>Done</span>";
        	}
        	?>
		</dd>
	</dl>
	</div>
	<div class="col-md-6">
	
	<dl>
		<dt><b class="border-bottom border-primary">Start Date</b></dt>
		<dd><?php echo ucwords($start_date) ?></dd>
		<br>
		<dt><b class="border-bottom border-primary">End Date</b></dt>
		<dd><?php echo ucwords($start_date) ?></dd>
		<br>
		<dt><b class="border-bottom border-primary">Description</b></dt>
		<dd><?php echo html_entity_decode($description) ?></dd>
	</dl>

	


						</div>
                    </div>
                </div>
            </div>
        </div>