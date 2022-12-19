<?php
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM project_list where id = ".$_GET['id'])->fetch_array();
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