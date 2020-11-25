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
                <h1 class="m-0 text-dark">manage catrgory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
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
                <div class="col-md-6">
                    <!-- card strat -->
                    <div class="card card-primary card-outline">
                        
                        <div class="card-header">
                        <h3 class="card-title">Add new category</h3>
                        </div> 

                        <div class="card-body">

                                <!-- Form -->

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label> Category Description</label>
                                    <textarea name="des" id="" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="my-input">Category status</label>
                                    <select name="status" id="" class="form-control" >
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit"  name="add_cat" class="btn btn-primary">
                                </div>
                            </form>
                                
                        </div>
                     </div> 
                        <!-- card end -->
                </div>

               

                <div class="col-md-6">
                    <!-- card strat -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Manage new category</h3>
                        </div>
                             <div class="card-body">
                             <table class="table table-bordered table-hover">
                            
                            <?php 
                                $sql="SELECT * FROM category ORDER BY name ASC";
                                $cat = mysqli_query($db,$sql);
                                $cat_count = mysqli_num_rows($cat);
                                $i=0;
                                if($cat_count == 0){
                                    echo "No category found";
                                }else{ ?>
                                <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#SI.</th>
                                            <th scope="col">category Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($cat)){
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $status = $row['status'];
                                        $des = $row['description'];
                                        $i++;
                                      ?>
                                            <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $name; ?></td>
                                            <td><?php
                                               if ($status==1) {
                                        ?>      <span class="badge badge-primary">Active</span>
                                        <?php  }else{ ?>
                                            <span class="badge badge-danger">In-Active</span>
                                            <?php }
                                               ?>
                                            </td>
                                            
                                            <td>
                                                <div class="action-bar">
                                                    <ul>
                                                        <li>
                                                        <a href="category.php?edit=<?php echo $id ?>"><i class="fa fa-edit"></i></a>
                                                        </li>
                                                        <li>
                                                        <a href="" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

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
                                                <a href="category.php?delete=<?php echo $id; ?>"class="btn btn-primary btn-danger"> Yes</a>
                                                                                    
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                    <?php         }
                             } ?>   
                             </tbody>
                            </table>
                        </div>
                     </div> 
                        <!-- card end -->
                </div>
                <!-- column end -->
                <!-- delete category -->
                <?php 
                    if(isset($_GET['delete'])){

                        $id = $_GET['delete'];
                        $sql = "DELETE FROM category WHERE id = '$id'";
                        $delete_cat = mysqli_query($db,$sql);
                        if($delete_cat){
                            header("Location: category.php");
                        }
                    }
                
                ?>
                
                
                <!-- add category -->
                <?php 
                    if (isset($_POST['add_cat'])) {
                        $name = $_POST['name'];
                        $des = $_POST['des'];
                        $status = $_POST['status'];
                        $sql = "INSERT INTO category (name,description,status) VALUES ('$name','$des', '$status')";
                        $cat = mysqli_query($db,$sql);
                        if($cat){
                            header("Location: category.php");
                        }
                    }
                
                ?>

                    <!-- edit category -->
                    <?php 
                    if(isset($_GET['edit'])){
                        
                        $id = $_GET['edit'];
                        $sql = "SELECT * FROM category WHERE id = '$id'";
                        $info = mysqli_query($db,$sql);
                        
                        while($row = mysqli_fetch_assoc($info)){
                            $name = $row['name'];
                            $status = $row['status'];
                            $des = $row['description'];
                            
                          ?>

                        
                    <div class="col-md-6">
                        <!-- card strat -->
                        <div class="card card-primary card-outline">
                            
                            <div class="card-header">
                            <h3 class="card-title">Add new category</h3>
                            </div> 

                            <div class="card-body">

                                    <!-- Form -->

                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="name" class="form-control" required="required" value="<?php echo "$name"; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label> Category Description</label>
                                        <textarea name="des" id="" class="form-control" rows="4" > <?php echo $des; ?> </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Category status</label>
                                        <select name="status" id="" class="form-control" >
                                        <option value="1" <?php if ($status == 1) {
                                            echo 'selected';
                                        }?>>Active</option>
                                        <option value="0" <?php if ($status == 0) {
                                            echo 'selected';
                                        }?>>In-Active</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="save_change" class="btn btn-primary" value="save changes">
                                    </div>
                                </form>
                                    
                            </div>
                        </div> 
                            <!-- card end -->
                    </div>
                           
                <?php 
                }
                    //senting update data
                    if (isset($_POST['save_change'])) {
                        
                        $name = $_POST['name'];
                        $des = $_POST['des'];
                        $status = $_POST['status'];
                        
                        $sql = "UPDATE category SET name='$name',description='$des',status='$status' WHERE id = '$id' ";
                        $cat_update = mysqli_query($db,$sql);
                        
                        if($cat_update){
                            header("Location: category.php");
                        }
                    }

                    }
                ?>             
           </div>
        </div>
   </section>
   <!-- Body content end -->
</div>
<?php include('inc/footer.php'); ?>