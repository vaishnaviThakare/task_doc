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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>  
          <?php if($_SESSION['login_type'] ==1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Faculty
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Manage Faculty</p>
                </a>
              </li>
            </ul>
          </li> 
          <?php endif;?>
          <li class="nav-item">
                <a href="#" class="nav-link nav-edit_project nav-view_project">
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>
                    Semester
                    <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <?php if($_SESSION['login_type'] == 1): ?>
           <li class="nav-item">
                <a href="./index.php?page=new_project" class="nav-link nav-new_project tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add Semester</p>
                </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="./index.php?page=project_list" class="nav-link nav-new_project tree-item">
              <i class="fas fa-angle-right nav-icon"></i>
              <p>Manage Semester</p>
          </a>
          </li>
          </ul>
          </li>
                <li class="nav-item">
                  <a href="#" class="nav-link nav-edit_project nav-view_project">
                <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Task
                <i class="right fas fa-angle-left"></i>
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
              <li class="nav-item">
                <a href="./index.php?page=task_list" class="nav-link nav-task_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Manage Task</p>
                </a>
              </li>
              <?php if($_SESSION['login_type']==1):?>
                <li class="nav-item">
                  <a href="./index.php?page=new_project" class="nav-link nav-new_project tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p> Review Task</p>
                  </a>
              </i>
              <?php endif;?>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=reports" class="nav-link nav-reports">
              <i class="fas fa-th-list nav-icon"></i>
              <p>Reports</p>
              </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=document" class="nav-link nav-document"> 
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Document</p>
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