<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<a href="./" class="brand-link bg-navy">
        <?php if($_SESSION['login_type'] == 1): ?>
        <h3 class="text-center p-0 m-0"><b>HOD</b></h3>
        <?php else: ?>
        <h3 class="text-center p-0 m-0"><b>FACULTY</b></h3>
        <?php endif; ?>
    </a>
    </div>
    <div class="sidebar pb-4 mb-4 bg-navy">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt" style='color: white'></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>  
          <?php if($_SESSION['login_type'] ==1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_faculty">
              <i class="nav-icon fas fa-users" style='color: white'></i>
              <p>
                Faculty
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=add_faculty" class="nav-link nav-add_faculty tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=manage_faculty" class="nav-link nav-manage_faculty tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Manage Faculty</p>
                </a>
              </li>
            </ul>
          </li> 
          <?php endif;?>
          <li class="nav-item">
                <a href="#" class="nav-link nav-edit_semester nav-view_project">
                  <i class=' nav-icon fa fa-graduation-cap' style='color: white'></i>

                  <p>
                    Semester
                    <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <?php if($_SESSION['login_type'] == 1): ?>
           <li class="nav-item">
                <a href="./index.php?page=add_semester" class="nav-link nav-add_semester tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Semester</p>
                </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="./index.php?page=manage_semester" class="nav-link nav-manage_semester tree-item">
              <i class="fas fa-angle-right nav-icon"></i>
              <p>Manage Semester</p>
          </a>
          </li>
          </ul>
          </li>

          <?php if($_SESSION['login_type'] ==1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_faculty">
              <i class="nav-icon fa fa-database" style='color: white'></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=add_master_data" class="nav-link nav-add_master_data tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Master Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=manage_master_data" class="nav-link nav-manage_master_datatree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Manage Master Data</p>
                </a>
              </li>
            </ul>
          </li> 
          <?php endif;?>
                <li class="nav-item">
                  <a href="#" class="nav-link nav-edit_task nav-view_task">
                <i class="nav-icon fas fa-layer-group" style='color: white'></i>
              <p>
                Task
                <i class="right fas fa-angle-left" ></i>
          </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($_SESSION['login_type'] ==1):?>
              <li class="nav-item">
                <a href="./index.php?page=add_task" class="nav-link nav-add_task tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Task</p>
                  
                </a>
              </li>
              <?php endif; ?>
              <?php if($_SESSION['login_type']==1):?>
              <li class="nav-item">
                <a href="./index.php?page=task_template" class="nav-link nav-task_template tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Task From Template</p>
                </a>
              </li>
              <?php endif;?>
              <li class="nav-item">
                <a href="./index.php?page=task_list" class="nav-link nav-task_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Manage Task</p>
                </a>
              </li>
              <?php if($_SESSION['login_type']==1):?>
                <li class="nav-item">
                  <a href="./index.php?page=review_task" class="nav-link nav-review_task tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p> Review Task</p>
                  </a>
              </i>
              <?php endif;?>
            </ul>
          </li>
          <?php if($_SESSION['login_type']==1):?>
          <li class="nav-item">
            <a href="./index.php?page=reports" class="nav-link nav-reports">
              <i class="fas fa-th-list nav-icon" style='color: white'></i>
              <p>Reports</p>
              </a>
              <?php endif;?>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=documents" class="nav-link nav-documents"> 
                  <i class='fa fa-folder nav-icon' style='color: white'></i>
                  <p>Document</p>
              </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=calindex" class="nav-link nav-calindex"> 
                  <i class='fa fa-calendar nav-icon' style='color: white'></i>
                  <p>Calendar</p>
              </a>
              </li>
              </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>