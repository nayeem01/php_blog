
<?php 
    include ("inc/header.php");
?>


    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">
                    <?php 
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT name FROM category WHERE id = '$id'";
                        $menu = mysqli_query($db,$sql);
                        $row = mysqli_fetch_row($menu);
                        echo $row[0];
                    }
                    ?>
                    
                    </h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active"><?php echo $row[0]; ?></li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-8">

                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $sql = "SELECT * FROM post WHERE id = '$id' ORDER BY id DESC";
                            $qury = mysqli_query($db,$sql);

                            $rowcount = mysqli_num_rows($qury);

                            if ($rowcount == 0) { ?>
                                <div class="alert alert-danger"> 
                                    sorry!! No post fount.
                                </div>
                            <?php } else{
                                while($row = mysqli_fetch_assoc($qury)){
                                        $id              = $row['id'];
                                        $title           = $row['title'];
                                        $description     = $row['description'];
                                        $image           = $row['image'];
                                        $category_id     = $row['category_id'];
                                        $author_id       = $row['author_id'];
                                        $status          = $row['status'];
                                        $tags            = $row['tags'];
                                        $post_date       = $row['post_date'];
                                       
                                ?>  
                                <!-- Single Item Blog Post Start -->
                                <div class="blog-post">
                                    <!-- Blog Banner Image -->
                                    <div class="blog-banner">
                                        <a href="single.php?post=<?php echo $id;?>">
                                            <img src="admin/img/post/<?php echo$image; ?>">
                                            <!-- Post Category Names -->
                                            <div class="blog-category-name">
                                                <h6>
                                                <?php 
                                                    $sql = "SELECT name FROM category WHERE id = '$id'";
                                                    $menu = mysqli_query($db,$sql);

                                                    $row = mysqli_fetch_row($menu);
                                                    echo $row[0];

                                                ?>
                                                
                                                </h6>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Blog Title and Description -->
                                    <div class="blog-description">
                                        <a href="single.php?post=<?php echo $id;?>">
                                            <h3 class="post-title"><?php echo $title; ?></h3>
                                        </a>
                                        <p>
                                        <?php echo substr($description,0,275); ?>
                                        </p>
                                        <!-- Blog Info, Date and Author -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="blog-info">
                                                    <ul>
                                                        <li><i class="fa fa-calendar"></i><?php echo $post_date; ?></li>
                                                        <li><i class="fa fa-user"></i>by - 
                                                        <?php 
                                                            $sql = "SELECT fullname FROM users WHERE id = '$author_id'";
                                                            $menu = mysqli_query($db,$sql);
            
                                                            $row = mysqli_fetch_row($menu);
                                                            echo $row[0];
                                                        
                                                        ?>
                                                        
                                                        </li>
                                                        <li><i class="fa fa-heart"></i>(50)</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4 read-more-btn">
                                                <button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }

                            }
                        }
                    
                    ?>

                    <!-- Single Item Blog Post End -->             
                </div>



                <!-- Blog Right Sidebar -->
                <?php include "inc/sidebar.php"?>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    



    <!-- :::::::::: Footer Buy Now Section Start :::::::: -->
   <?php include "inc/footer.php"?>

  </body>
</html>