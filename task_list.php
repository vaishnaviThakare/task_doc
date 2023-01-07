<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-body">
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="1%">
				</colgroup>
				<thead>
					<tr>
						<th class="textcenter">#</th>
						<th>Task Name</th>
						<th>Assign To</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry =$conn->query("SELECT * FROM task_list");
					while($row= $qry->fetch_assoc()):
						?>
					<tr>
					<th class="text-center"><?php echo $i++ ?></th>
						<td><p><b><?php echo ucwords($row['title']) ?></b></p></td>
						<td class=""><?php echo ucwords($row['assign_to']) ?></p></td>
						<td><b><?php echo date("M d, Y",strtotime($row['start_date'])) ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['end_date'])) ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_task" href="./index.php?page=view_task&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>

		                      <?php if($_SESSION['login_type'] != 3): ?>
							
		                      <a class="dropdown-item" href="./index.php?page=edit_task&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
							  

							  <?php elseif($_SESSION['login_type'] = 3): ?>

							  
							  <a class="dropdown-item" href="./index.php?page=add_document&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
							  <?php endif; ?>

							  <?php if($_SESSION['login_type'] != 3): ?>
		                      <a class="dropdown-item delete_task" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                  <?php endif; ?>
		                    </div>
							  </td>
							  </tr>
							  <?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table p{
		margin: unset !important;
	}
	table td{
		vertical-align: middle !important
	}
</style>
<script>
	
	$(document).ready(function(){
		
	
		$('.delete_task').click(function(){
		_conf("Are you sure to delete this task?","delete_task",[$(this).attr('data-id')])
		})
		})
	function delete_task($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_task',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>