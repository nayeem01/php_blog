<?php include('inc/header.php'); ?>
<?php include('inc/topbar.php'); ?>
<?php include('inc/menu.php'); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage user</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
           </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<?php 
 if($_SESSION['role '] == 1){
     
    $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

    if ($do == 'manage') { ?>

        <!-- Body content start -->
        <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <!-- card strat -->
                        
                         <div class="card card-primary card-outline">
                         <div class="card-header">
                            <h3 class="card-title">Manage users</h3>
                         </div>
                             <div class="card-body">
                                 
                             <table class="table table-bordered table-striped table-hover justify-content-center">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#SI.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Adress</th>
                                    <th scope="col">User Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Join date</th>
                                    <th scope="col">Action</th>
                                   </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $sql ="SELECT * FROM users";
                                    $user = mysqli_query($db, $sql);
                                    $i=0;
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
                                        $i++;
                                    ?>
                                    <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td>
                                        <?php 
                                            if(!empty($image)){?>
                                                <img src="img/users/<?php echo $image; ?>" alt="" width="35">
                                            <?php }else{ ?>
                                                <img src="img/users/default.png" alt="" width="35">
                                            <?php }
                                        
                                        ?>

                                    </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $phone; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php 
                                     if ($role==1) {
                                    ?>      <span class="badge badge-primary badge-success">Admin</span>
                                    <?php  }else{ ?>
                                            <span class="badge badge-danger">Editor</span>
                                    <?php }
                                                                        
                                    ?></td>
                                    <td><?php 
                                     if ($status==0) {
                                        ?>      <span class="badge badge-danger">In-active</span>
                                        <?php  }else{ ?>
                                                <span class="badge badge-success">Active</span>
                                        <?php }                                    
                                    
                                    ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td>
                                    <div class="action-bar">
                                        <ul class="justify-content-center">
                                           <li>
                                            <a href="user.php?do=edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <li>
                                            <a href="" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></a>
                                            </li>
                                         </ul>
                                    </div>
                                    </td>
                                    </tr>  
                                    <!-- modal -->

                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Are you sure ?</h3>
                                            </div>
                                            <div class="modal-footer text-center">
                                           
                                                
                                                <button type="button" class="btn btn-secondary btn-center" data-dismiss="modal">Close</button>
                                                <a href="user.php?do=delete&id=<?php echo $id; ?>"class="btn btn-primary btn-danger"> Yes</a>
                                                                                    
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>                      

                                  <?php  } ?>


                                 </tbody>
                                </table>

                             </div>
                          </div> 
                     </div>
                </div>
             </div>
        </section>

  
<?php    }elseif ($do == 'add') { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Add New User</h3>
                    </div>
                        <div class="card-body">
                        
                        
                        <form action="user.php?do=insert" method="POST" enctype="multipart/form-data">
 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="name">Full Name</label>
                                <input type="name" class="form-control" name="fullname">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="phone">Phone No.</label>
                                <input type="text" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class= "form-row">
                            <div class="form-group col-md-6">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" name="username" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Adress</label>
                                <input type="text" class="form-control" name="address" >
                            </div>

                            </div>
                            <div class= "form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="role">Role</label>
                                    <select id="status" class="form-control" name="role">
                                        <option selected>Choose...</option>
                                        <option value=1>admin</option>
                                        <option value=2>editor</option>
                                    </select>
                                </div> 
                            
                            </div>
                            

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password">
                                </div>

                                <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option selected>Choose...</option>
                                    <option value=0>inactive</option>
                                    <option value=1>active</option>
                                </select>
                                </div> 
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="repassword">Retype Password</label>
                                <input type="text" class="form-control" name="repassword">
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label for="image">Profile picture</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                           
                            </div>
                            <div class="col text-center">
                                 <button type="submit" class="btn btn-primary">Sign up</button>
                            </div>
                        </form>


                        </div>
                     </div> 
                      
                </div>
           </div>
        </div>
   </section>

<?php }elseif($do == 'insert'){
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $name     = $_POST['fullname'];
        $email    = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repass   = $_POST['repassword'];
        $address  = $_POST['address'];
        $phone    = $_POST['phone'];
        $status   = $_POST['status'];
        $role     = $_POST['role'];

        #image read
        $image     = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];

        if ($password == $repass ) {
            $hasspass = sha1($password);

            $image = rand(0,5000).'_'.$image;
            move_uploaded_file($imageTmp,"img/users/".$image);

            $sql = "INSERT INTO users (fullname, email, username, password, phone, address, role, status, image, join_date) 
            VALUES ('$name','$email','$username','$hasspass','$phone','$address','$role','$status','$image',now())";
           
           $adduser = mysqli_query($db,$sql);

           if($adduser){
               header('Location: user.php?do=manage');
           }else{
               die();
           }
        }else {
           echo "invalid";
        }
       
    }
    }elseif ($do == 'edit') {

       if(isset($_GET['id'])){
            $userid = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id  = '$userid' ";
            $theuser = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_assoc($theuser)) {
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
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            
                                <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Update user info</h3>
                                </div>
                                    <div class="card-body">
                                    
                                    
                                    <form action="user.php?do=update" method="POST" enctype="multipart/form-data">
            
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="name">Full Name</label>
                                            <input type="name" class="form-control" name="fullname" value = "<?php echo $username; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="phone">Phone No.</label>
                                            <input type="text" class="form-control" name="phone" value = "<?php echo $phone; ?>">
                                            </div>
                                        </div>

                                        <div class= "form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">User Name</label>
                                            <input type="text" class="form-control" name="username"  value = "<?php echo $name; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Adress</label>
                                            <input type="text" class="form-control" name="address" value = "<?php echo $address; ?>">
                                        </div>

                                        </div>
                                        <div class= "form-row">
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" value = "<?php echo $email; ?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="role">Role</label>
                                                <select id="status" class="form-control" name="role" >
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
                                            <select  class="form-control" name="status" >
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
                                            <input type="submit" class="btn btn-primary" name="updateuser" value="save changes">
                                        </div>
                                    </form>


                                    </div>
                                </div> 
                                
                            </div>
                    </div>
                    </div>
            </section>

           <?php  }


       }

        
    }elseif ($do == 'update') {

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $updateUserID = $_POST['updateuserid'];
  
            $fullname     = $_POST['fullname'];
            $email        = $_POST['email'];
            $password     = $_POST['password'];
            $rePassword   = $_POST['rePassword'];
            $phone        = $_POST['phone'];
            $address      = $_POST['address'];
            $role         = $_POST['role'];
            $status       = $_POST['status'];
  
            $image        = $_FILES['image']['name'];
            $imageTmp     = $_FILES['image']['tmp_name'];
  
            if ( !empty($password) && !empty($image) ){

                // Encryption Password
                if ( $password == $rePassword ){
                  $hassedPass = sha1($password);
                }            
    
                // Change the Image File Name
                $image = rand(0,5000000) . '_' . $image;
                move_uploaded_file($imageTmp, "img/users/" . $image);
    
                // Delete Existing Image
                $query = "SELECT * FROM users WHERE id = '$updateUserID'";
                $read_user_data = mysqli_query($db, $query);
                while( $row = mysqli_fetch_assoc($read_user_data) ){
                  $existingImage      = $row['image'];
                }
                unlink("img/users/". $existingImage);
    
                // Update SQL With Image and Password
                $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status', image='$image' WHERE id = '$updateUserID'";
    
                $addUser = mysqli_query($db, $sql);
    
                if ( $addUser ){
                  header("Location: user.php?do=manage");
                }
                else{
                  die( "MySQLi Error. " . mysqli_error($db) );
                }            
              
            
            
            
            }elseif(!empty($password)){

                $hassedPass = sha1($password);
                $sql = "UPDATE users SET password='$hassedPass' WHERE id = '$updateUserID'";
            
                $addUser = mysqli_query($db, $sql);
                
                if ( $addUser ){
                header("Location: user.php?do=manage");
                }


            }else{
        
            
            // Update SQL
            $sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$updateUserID'";
            
            $addUser = mysqli_query($db, $sql);
            
            if ( $addUser ){
              header("Location: user.php?do=manage");
            }
            else{
              die();
            }
            }
            
        }
  }elseif ($do == 'delete') {
    if ( isset($_GET['id']) ){
        $delete_user_id = $_GET['id'];

          // Delete Existing Image
          $query = "SELECT * FROM users WHERE id = '$delete_user_id'";
          $read_user_data = mysqli_query($db, $query);
          while( $row = mysqli_fetch_assoc($read_user_data) ){
            $existingImage      = $row['image'];
          }
          unlink("img/users/". $existingImage);

          // Delete The User
          $sql = "DELETE FROM users WHERE id = '$delete_user_id'";
          $confirmDelete = mysqli_query($db, $sql);

          if ( $confirmDelete ){
            header("Location: user.php");
          }
          else{
            die("MySQLi Error. " . mysqli_error($db));
          }

      }
    }


 }else{

    echo '<div class = "alert alert-warning">You dont have access</div>';
 }
?>


</div>
<?php include('inc/footer.php'); ?>


   <!-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Manage users</h3>
                    </div>
                        <div class="card-body">
                            
                        </div>
                     </div> 
                      
                </div>
           </div>
        </div>
   </section> -->
 