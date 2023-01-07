<?php
if(!isset($conn))
include 'db_connect.php';
$qry = $conn->query("UPDATE task_list SET status = 2");
?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-rework-task">
      <div class="col-md-6">
				<div class="form-group">
                <label for="">Completed by</label>
                    <?php
                    $s=$conn->query("SELECT * FROM users");
                    ?>
                    <select name="assign_to" id="assign_to" class="custom-select custom-select-sm">
                        <?php
                        while($r =mysqli_fetch_array($s))
                        {
                            ?>
                            <option><?php echo $r['firstname']; ?> <?php echo $r['lastname']; ?></option>

                            <?php
                        }
                        ?>
                    </select>					
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
                <label for="" class="control-label">Add comments to rework</label>
			              <textarea name="comment" class="form-control form-control-sm" id="comment" style="font-family:sans-serif;font-size:1.2em;">
                    <?php echo isset($comment) ? $comment : '' ?> 
                    </textarea>
        </div>
      </div>

      <div class="col-lg-12 text-right justify-content-center d-flex">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-rework-task">Save</button>
        </div>
      </div>     

<script>
  $('#manage-rework-task').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_rework',
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
						location.href = 'index.php?page=review_task'
					},2000)
				}
			}
		})
	})
</script>