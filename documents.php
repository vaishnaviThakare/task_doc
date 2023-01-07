<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
			     <!-- <?php if($_SESSION['login_type'] == 1 ): ?> -->
				<colgroup>
					<col width="10%">
					<col width="25%">
					<col width="35%">
					<col width="20%">
					<col width="10%">
				</colgroup>
				<?php endif; ?>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Task Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry =$conn->query("SELECT * FROM task_list where status = 3");
					while($row= $qry->fetch_assoc()):
						?>
					<tr>
					<th class="text-center"><?php echo $i++ ?></th>
						<td><p><b><?php echo ucwords($row['title']) ?></b></p></td>
						<td><b><?php echo date("M d, Y",strtotime($row['start_date'])) ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['end_date'])) ?></b></td>
						<td class="text-center">
							
                        <div class="btn-group">
		                       
		                        
                        <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_document" href="./index.php?page=view_document&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
                              <?php if($_SESSION['login_type'] != 3): ?>
		                      <a class="dropdown-item delete_document" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
<script>
	$(document).ready(function(){
		
	$('.delete_document').click(function(){
	_conf("Are you sure to delete this document?","delete_document",[$(this).attr('data-id')])
	})
	})
	function delete_document($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_file',
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