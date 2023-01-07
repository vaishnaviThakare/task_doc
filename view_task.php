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
	    <dt><b class="border-bottom border-primary">Assign To</b></dt>
		<dd><?php echo ucwords($assign_to) ?></dd>
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
		<dt><b class="border-bottom border-primary">Reccuring Duration</b></dt>
		<dd><?php echo ucwords($reccuring) ?></dd>
		<br>
		<dt><b class="border-bottom border-primary">Description</b></dt>
		<dd><?php echo html_entity_decode($description) ?></dd>
	</dl>

	


	</div>
                    </div>
                </div>
            </div>
        </div>

		
		<div class="col-md-5">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h5><b>Files</b></h5>
				</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="alert alert-info px-2 py-1"><i class="fa fa-info-circle"></i> Click the file to download.</div>
						<div class="row">
							 <?php
					            if(isset($file_json) && !empty($file_json)):
					              foreach(json_decode($file_json) as $k => $v):
					                if(is_file('assets/uploads/'.$v)):
					                $_f = file_get_contents('assets/uploads/'.$v);
					                $dname = explode('_', $v);
					         ?>
		 
							<div class="col-sm-3">
								<a href="download.php?f=<?php echo $v ?>" target="_blank" class="text-white border-rounded file-item p-1">
			                      <span class="img-fluid bg-dark border-rounded px-2 py-2 d-flex justify-content-center align-items-center" style="width: 100px;height: 100px">
			                      	<h3 class="bg-dark"><i class="fa fa-download"></i></h3>
			                      </span>
			                      <span class="text-dark"><?php echo $dname[1] ?></span>
			                    </a>
							</div>
							 <?php endif; ?>
					         <?php endforeach; ?>
					         <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.file-item').hover(function(){
		$(this).addClass("active")
	})
	$('file-item').mouseout(function(){
		$(this).removeClass("active")
	})
	$('.file-item').click(function(e){
		e.preventDefault()
		_conf("Are you sure to download this file?","dl",['"'+$(this).attr('href')+'"'])
	})
	function dl($link){
		start_load()
		window.open($link,"_blank")
		end_load()
	}
	
</script>