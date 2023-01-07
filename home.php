<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
 <div class="col-12">
          <div class="card">    
          </div>
  </div>
  <div class ="row">
     <div class ="col ">
  <!-- <div class="col-md-4">
          <div class="col-12 col-sm-6 col-md-12"> -->
            <div class="small-box bg-info shadow-sm border">
              <div class="inner">
              <h3><?php echo $conn->query("SELECT * FROM task_list $twhere")->num_rows; ?></h3>
                <p>Total Tasks</p>
              </div>
              <div class="icon">
                <i class="fa fa-layer-group"></i>
              </div>
            </div>
          </div>

          <div class ="col">
          <!-- <div class="col-12 col-sm-6 col-md-12"> -->
            <div class="small-box bg-secondary shadow-sm border">
              <div class="inner">
              <h3><?php echo $conn->query("SELECT * FROM task_list where status=1 ")->num_rows; ?></h3>
                <p>To-Do Tasks</p>
              </div>
              <div class="icon">
                <i class="fa fa-tasks"></i>
              </div>
            </div>
          </div> 

          <div class ="col">
          <!-- <div class="col-12 col-sm-6 col-md-12"> -->
            <div class="small-box bg-warning shadow-sm border">
              <div class="inner">
              <h3><?php echo $conn->query("SELECT * FROM task_list where status =2")->num_rows; ?></h3>
                <p>In-Progress Tasks</p>
              </div>
              <div class="icon">
                <i class="fa fa-bars"></i>
              </div>
            </div>
          </div>

          <div class ="col">
          <!-- <div class="col-12 col-sm-6 col-md-12"> -->
            <div class="small-box bg-success shadow-sm border">
              <div class="inner">
              <h3><?php echo $conn->query("SELECT * FROM task_list where status =3")->num_rows; ?></h3>
                <p>Completed Tasks</p>
              </div>
              <div class="icon">
                <i class='fa fa-check-circle'></i>
              </div>
            </div>
          </div>

          
          <?php if($_SESSION['login_type'] ==1): ?>
          <!-- <div class="col-12 col-sm-6 col-md-12"> -->
          <div class ="col">
            <div class="small-box bg-danger shadow-sm border">
              <div class="inner">
              <h3><?php echo $conn->query("SELECT * FROM task_list where status =4")->num_rows; ?></h3>
                <p>Review Tasks</p>
              </div>
              <div class="icon">
                <i class='fa fa-check-square'></i>
              </div>
            </div>
          </div>
          </div>
          
          <?php endif;?>

     
      