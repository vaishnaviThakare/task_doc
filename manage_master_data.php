<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		
		<div class="card-body">
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="5%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
					<col width="20%">
					
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th><p align="center">Task Category</p></th>
						<th><p align="center">Template Name</p></th>
						<th><p align="center">Task Name</p></th>
						<th><p align="center">Action</p></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry =$conn->query("SELECT * FROM template ORDER BY id ASC");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><p align="center"><b><?php echo ucwords($row['task_cat']) ?></b></p></td>
						<td><p align="center"><b><?php echo ucwords($row['temp_name']) ?></b></p></td>
                        <td><p align="center"><b><?php echo ucwords($row['title']) ?></b></p></td>
						
						
						
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <?php if($_SESSION['login_type'] != 3): ?>
		                      <a class="dropdown-item" href="./index.php?page=edit_master_data&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_mdata" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
		
	
	$('.delete_mdata').click(function(){
	_conf("Are you sure to delete this template?","delete_mdata",[$(this).attr('data-id')])
	})
	})
	function delete_mdata($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_mdata',
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