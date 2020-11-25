<?php include('inc/header.php'); ?>  
  
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="dashboard.php" class="d-block"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        
        <!-- category start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Catagory</p>
                </a>
              </li>
              </ul>
          </li>
            <!-- Category end -->

           <!--  User post start-->
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                All post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post.php?do=manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="post.php?do=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new post</p>
                </a>
                </li>
              </ul>
            </li>
            <!--  User post end-->

              <!--  User comment start-->
               <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tree"></i>
                      <p>
                    All comment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage comment</p>
                    </a>
                  </li>
                </ul>
             </li>
                <!--  User menu end-->

<?php 

  if ($_SESSION['role ']  == 1) {
    ?>
              <!--  User menu start-->
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                All User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php?do=manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user.php?do=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new Users</p>
                </a>
                </li>
              </ul>
            </li>
            <!--  User menu end-->

            <!--  Website settings menu start-->
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                PLatfrom Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social media </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Settings</p>
                </a>
                </li>
              </ul>
            </li>
            <!--  platfrom  menu end-->
    <?php
  }

?>

<?php 


if ($_SESSION['role ']  == 2) {
  ?>
        
<li class="nav-item has-treeview">
  <a href="myProfile.php" class="nav-link">
        <i class="fas fa-user"></i>
          <p>
        my profile
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
 </li>
           
          
  <?php
}



?>     
            
            
            <!-- sign out  -->
            <li class="nav-item">
            <a href="logout.php" class="nav-link">
              
              <p>
               Sign out
              </p>
              <i class="fas fa-sign-out-alt"></i>
            </a>
           </li>
          <!-- <li class="nav-header">LABELS</li> -->

          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>