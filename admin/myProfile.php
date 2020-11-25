<?php include('inc/header.php'); ?>
<?php include('inc/topbar.php'); ?>
<?php include('inc/menu.php'); ?>




<?php 

$do = isset($_GET['do']) ? $_GET['do'] : 'status';
if($do == 'status'){  ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">My Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">My profile</li>
                <li class="breadcrumb-item active"><a href="myProfile.php?do=editprofile">Edit profile</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
           </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
   <!-- Body content start -->
   <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- card strat -->
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                                <?php 

                                    $userId = $_SESSION['id'];
                                    $sql ="SELECT * FROM users where id = '$userId'";
                                    $user = mysqli_query($db, $sql);
                                   
                                    while( $row = mysqli_fetch_assoc($user) ){
                                        $id = $row['id'];
                                        $name = $row['fullname'];
                                        $email = $row['email'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        $address = $row['address'];
                                        $phone = $row['phone'];
                                        $status = $row['status'];
                                        $image = $row['image'];
                                        $role= $row['role'];
                                        $date = $row['join_date'];
                                       
                                ?>

                             <table class="table table-dark table-bordered table-hover table-striped">                      
                                        <tbody>
                                            <tr>
                                            <th scope="row">Image</th>
                                            <th> <img src="img/users/<?php echo $image; ?>" width="50"> </th>
                                            </tr>
                                            <tr>
                                            <th scope="row">Fullname</th>
                                            <th><?php echo $name; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">username</th>
                                            <th><?php echo $username; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">Email</th>
                                            <th><?php echo $email; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">Phone</th>
                                            <th><?php echo $phone; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">adress</th>
                                            <th><?php echo $address; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">User Role</th>
                                            <th><?php echo $role; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">Status</th>
                                            <th><?php echo $status; ?></th>
                                            </tr>
                                            <tr>
                                            <th scope="row">Join date</th>
                                            <th><?php echo $date; ?></th>
                                            </tr>
                                    <?php }?>
                                     
                                 </tbody>
                            </table>
                        </div>
                     </div> 
                        <!-- card end -->
                </div>
           </div>
        </div>
   </section>
   <!-- Body content end -->

<<?php 
}elseif ($do == 'editprofile') {?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">My profile</li>
                <li class="breadcrumb-item active"><a href="myProfile.php?do=editprofile">Edit profile</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
           </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- card strat -->
                    <div class="card card-primary card-outline">
                        
                        <div class="card-body">
                        <?php 

                        $userId = $_SESSION['id'];
                        $sql ="SELECT * FROM users where id = '$userId'";
                        $user = mysqli_query($db, $sql);

                        while( $row = mysqli_fetch_assoc($user) ){
                            $id = $row['id'];
                            $name = $row['fullname'];
                            $email = $row['email'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $address = $row['address'];
                            $phone = $row['phone'];
                            $status = $row['status'];
                            $image = $row['image'];
                            $role= $row['role'];
                            $date = $row['join_date'];

                        ?>

                        <form action="myProfile.php?do=updateprofile" method="POST" enctype="multipart/form-data">
            
                         <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="name" class="form-control" name="fullname" value = "<?php echo $name; ?>" >
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Phone No.</label>
                                    <input type="text" class="form-control" name="phone" value = "<?php echo $phone; ?>">
                                    </div>
                                </div>

                                <div class= "form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" name="username"  value = "<?php echo $username; ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">Adress</label>
                                    <input type="text" class="form-control" name="address" value = "<?php echo $address; ?>">
                                </div>

                                </div>
                                <div class= "form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value = "<?php echo $email; ?>" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="role">Role</label>
                                        <select id="status" class="form-control" name="role" disabled>
                                            <option selected>Choose...</option>
                                            <option value="1" <?php if ($role == 1) {
                                                echo 'selected';
                                            }?>>inactive</option>
                                            <option value="2" <?php if ($role == 2) {
                                                echo 'selected';
                                            }?>>active</option>
                                        </select>
                                    </div> 
                                
                                </div>
                                

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder = "New password" >
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label >Status</label>
                                    <select  class="form-control" name="status"  disabled>
                                    <option selected>Choose...</option>
                                        <option value="0" <?php if ($status == 0) {
                                                echo 'selected';
                                            }?>>super admin</option>
                                        <option value="1" <?php if ($status == 1) {
                                                echo 'selected';
                                            }?>>editor</option>
                                    </select>
                                    </div> 
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="repassword">Retype Password</label>
                                    <input type="password" class="form-control" name="repassword" placeholder = "Repeat password" >
                                </div>
                                
                                <div class="form-group col-md-6">
                                <label for="image">Profile picture</label>
                                            <?php 
                                            if (!empty($image)) {?>
                                                    <img src="img/users/<?php echo $image; ?>" width=35>
                                            <?php } else { ?>
                                                    <img src="img/users/default.png" width=35>
                                            <?php }
                                            ?>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                            
                                </div>
                                <div class="col text-center">
                                    <input type="hidden" name="updateuserid" value= "<?php echo $id; ?>">
                                    <input type="submit" class="btn btn-primary" name="updateprofile" value="save changes">
                                </div>
                            </form>
                                
                        </div>
                     </div> 
                        <!-- card end -->
                </div>
           </div>
        </div>
   </section>
<?php } 

    }elseif ($do == 'updateprofile') {
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
           
            $updateUserID = $_POST['updateuserid'];
  
            $fullname     = $_POST['fullname'];
            
            $password     = $_POST['password'];
            $rePassword   = $_POST['rePassword'];
            $phone        = $_POST['phone'];
            $address      = $_POST['address'];
            
  
            $image        = $_FILES['image']['name'];
            $imageTmp     = $_FILES['image']['tmp_name'];
  
 
                // Update SQL
                $sql = "UPDATE users SET fullname='$fullname', phone='$phone', address='$address' WHERE id = '$updateUserID'";
                
                $addUser = mysqli_query($db, $sql);
                
                if ( $addUser ){
                header("Location: myProfile.php");
                }
                else{
                  die();
                }
        }
            
    }
    
?>



</div>
<?php include('inc/footer.php'); ?>