<?php include("includes/header.php"); ?>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
     
        <?php include("includes/top-nav.php"); ?>
        
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
     >
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create channels</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create channels</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="card p-5">
                            
                            <form action="" method="POST" enctype="multipart/form-data">
<?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_POST['create-channel'])) {
        
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);

        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];

        move_uploaded_file($picture_tmp, "../image/$picture");

                $create_room = mysqli_query($connection, "

                    INSERT 
                        INTO 
                            channel
                                (
                                    title, 
                                    price, 
                                    picture
                                )
                            VALUES
                                (
                                '$title', 
                                '$price', 
                                '$picture'
                                )

                    ");
                if ($create_room) {
                    $_SESSION['message'] = "<div class='alert alert-success'><strong> Alert! </strong> channel has been Created Successfully!</div>";
                    header("Location: create-channel.php");
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Problem Occured while creating record.</div>";
                    header("Location: create-channel.php");
                }
                
 

    }




?>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" placeholder="channel Title" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price  RS</label>
                                    <input type="number" name="price" placeholder="channel Price (RS)" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Channel Logo</label>
                                    <input type="file" name="picture" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="create-channel" value="Create channel" class="btn btn-primary btn-block">
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
           
          
        </div>
       
    </div>
  
<?php include("includes/footer.php"); ?>