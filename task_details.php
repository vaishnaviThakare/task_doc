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
						
							<dt><b class="border-bottom border-primary">Academic Year</b></dt>
							<dd><?php echo ucwords($academic_year) ?></dd>
						
							<dt><b class="border-bottom border-primary">Semester Number</b></dt>
							<dd><?php echo ucwords($semester_number) ?></dd>

							<dt><b class="border-bottom border-primary">Start Date</b></dt>
							<dd><?php echo ucwords($start_date) ?></dd>
						
							<dt><b class="border-bottom border-primary">End Date</b></dt>
							<dd><?php echo ucwords($end_date) ?></dd>
						
							<dt><b class="border-bottom border-primary">Description</b></dt>
							<dd><?php echo html_entity_decode($description) ?></dd>
						</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h5><b>File/s</b></h5>
				</div>
				<div class="card-body">
				<div class="col-md-5">
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

<div class="col-lg-12 text-right justify-content-center d-flex">
				<div class="d-flex w-100 justify-content-center align-items-center">
                <a class="btn btn-flat  bg-gradient-primary mx-2" href="./index.php?page=rework">Rework</a>
                <a class="btn btn-flat  bg-gradient-primary mx-2" href="./index.php?page=completed_tasks">Complete</a>
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
	$.ajax({
			url:'ajax.php?action=complete_task',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(status){
				if(status == 1){
					alert_toast('Task Completed successfully',"success");
					setTimeout(function(){
						location.replace('index.php?page=task_list')
					},750)
				}else if(status != 1){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	
</script>