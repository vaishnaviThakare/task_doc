<?php
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM semester where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

 <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            
            <div class="card-tools">
            	<button class="btn btn-flat btn-sm bg-gradient-success btn-success" id="print"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
          <div class="card-body p-0">
		  <div class="table-responsive" id="printable">
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12">
			<div class="callout callout-info">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-6">
							<dl>
								
                                <dt><b class="border-bottom border-primary">Semester Number</b></dt>
		                        <dd><?php echo ucwords($semester_number) ?></dd>
								<dt><b class="border-bottom border-primary">Academic Year</b></dt>
		                       <dd><?php echo ucwords($academic_year) ?></dd>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
	
<div class="row">
		<div class="col-md-12">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<span><b>Task List:</b></span>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
					<table class="table table-condensed m-0 table-hover">
						<colgroup>
							<col width="7%">
							<col width="30%">
							<col width="20%">
							<col width="20%">
							<col width="35%">
						</colgroup>
						<thead>
							<th><p align="center">#</p></th>
							<th><p align="center">Task</p></th>
							<th><p align="center">Start Date</p></th>
							<th><p align="center">End Date</p></th>
							<th>Status</th>
							<th><p align="center">Completed By</p></th>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							$tasks = $conn->query("SELECT * FROM task_list");
							while($row=$tasks->fetch_assoc()):
								$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
								unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
								$desc = strtr(html_entity_decode($row['description']),$trans);
								$desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
							?>
								<tr>
			                        <td class="text-center"><?php echo $i++ ?></td>
			                        <td class=""><b><p align="center"><?php echo ucwords($row['title']) ?></p></b></td>
			                        <td class=""><p align="center"><?php echo ucwords($row['actual_start_date']) ?></p></td>
									<td class=""><p align="center"><?php echo ucwords($row['actual_end_date']) ?></p></td>
									
			                        <td>
			                        	<?php 
			                        	if($row['status'] == 1){
									  		echo "To-Do";
			                        	}elseif($row['status'] == 2){
									  		echo "In-Progress";
			                        	}elseif($row['status'] == 3){
									  		echo "Done";
			                        	}
										elseif($row['status'] == 4){
											echo "Review";
									    }
			                        	?>
			                        </td>
									<td class=""><?php echo ucwords($row['assign_to']) ?></p></td>
			                      
					</tr>	
				<?php endwhile; ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div> 
</div>
          </div>
        </div>
        </div>
<script>
	$('#print').click(function(){
		start_load()
		var _h = $('head').clone()
		var _p = $('#printable').clone()
		var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
		_p.prepend(_d)
		_p.prepend(_h)
		var nw = window.open("","","width=900,height=600")
		nw.document.write(_p.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)
	})

	
</script>


<style>
	.users-list>li img {
	    border-radius: 50%;
	    height: 67px;
	    width: 67px;
	    object-fit: cover;
	}
	.users-list>li {
		width: 33.33% !important
	}
	.truncate {
		-webkit-line-clamp:1 !important;
	}
</style>
