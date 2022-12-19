<?php
include 'db_connect.php';
$stat = array("To-Do","In-Progress","Done","Review");
$qry = $conn->query("SELECT * FROM task_list where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
// $tprog = $conn->query("SELECT * FROM task_list where project_id = {$id}")->num_rows;
// $cprog = $conn->query("SELECT * FROM task_list where project_id = {$id} and status = 3")->num_rows;
// $prog = $tprog > 0 ? ($cprog/$tprog) * 100 : 0;
// $prog = $prog > 0 ?  number_format($prog,2) : $prog;
$prod = $conn->query("SELECT * FROM user_productivity where project_id = {$id}")->num_rows;
if($status == 0 && strtotime(date('Y-m-d')) >= strtotime($start_date)):
if($prod  > 0  || $cprog > 0)
  $status = 2;
else
  $status = 1;
elseif($status == 0 && strtotime(date('Y-m-d')) > strtotime($end_date)):
$status = 4;
endif;
// $manager = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where id = $manager_id");
// $manager = $manager->num_rows > 0 ? $manager->fetch_array() : array();
?>
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12">
			<div class="callout callout-info">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-6">
							<dl>
								<dt><b class="border-bottom border-primary">Task Name</b></dt>
								<dd><?php echo ucwords($task_name) ?></dd>
								<dt><b class="border-bottom border-primary">Description</b></dt>
								<dd><?php echo html_entity_decode($description) ?></dd>
							</dl>
						</div>
						<div class="col-md-6">
							<dl>
								<dt><b class="border-bottom border-primary">Start Date</b></dt>
								<dd><?php echo date("F d, Y",strtotime($start_date)) ?></dd>
							</dl>
							<dl>
								<dt><b class="border-bottom border-primary">End Date</b></dt>
								<dd><?php echo date("F d, Y",strtotime($end_date)) ?></dd>
							</dl>
							<dl>
								<dt><b class="border-bottom border-primary">Status</b></dt>
								<dd>
									<?php
									  if($stat[$status] =='To-Do'){
									  	echo "<span class='badge badge-secondary'>{$stat[$status]}</span>";
									  }elseif($stat[$status] =='In-Progress'){
									  	echo "<span class='badge badge-primary'>{$stat[$status]}</span>";
									  }elseif($stat[$status] =='Done'){
									  	echo "<span class='badge badge-info'>{$stat[$status]}</span>";
									  }elseif($stat[$status] =='Review'){
									  	echo "<span class='badge badge-warning'>{$stat[$status]}</span>";
									  }
									?>
								</dd>
							</dl>
							<dl>
								<dt><b class="border-bottom border-primary">Assign To</b></dt>
								<dd>
								<dd><?php echo ucwords($assign_to) ?></dd>
					
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		
		