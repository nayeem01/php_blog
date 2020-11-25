
<?php 
    include ("inc/header.php");
?>

<body>
    <!-- :::::::::: Header Section Start :::::::: -->
    
    <!-- ::::::::::: Header Section End ::::::::: -->
    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Search Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
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
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];

                            $sql = "SELECT * FROM post WHERE title LIKE '%$search%' OR description LIKE 
                                    '%$search%'";
                            $qury = mysqli_query($db, $sql);
                            $rowcount = mysqli_num_rows($qury);

                            if ($rowcount == 0) { ?>
                                <div class ="alert alert-danger"><strong>
                                    Sorry no post found!!!!
                                </strong></div>
                            <?php }else{
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
                            <div class="blog-post">
                            <!-- Blog Banner Image -->
                            <div class="blog-banner">
                                <a href="single.php?post=<?php echo $id;?>">
                                    <img src="admin/img/post/<?php echo$image; ?>">
                                    <!-- Post Category Names -->
                                    <div class="blog-category-name">
                                        <h6>
                                        <?php 
                                            $sql = "SELECT name FROM category WHERE id = '$author_id'";
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
                                        <a href = "single.php?post=<?php echo $id;?>" class="btn-main">Read More <i class="fa fa-angle-double-right">
                                        </i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }  
                            }

                        }
                    
                    ?>

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