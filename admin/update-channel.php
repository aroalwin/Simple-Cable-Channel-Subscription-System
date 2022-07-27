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
						<?php
						
						$id = $_GET['id'];
						?>
                            
                            <form action="" method="POST" enctype="multipart/form-data">
<?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_POST['update-channel'])) {
        
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);

        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];

        move_uploaded_file($picture_tmp, "../image/$picture");

                $update_room = mysqli_query($connection, "

                    UPDATE
                            channel
                                 SET 
                                                        title = '$name', 
                                                        price = '$price',
														picture = '$picture'
WHERE id = $id
                    ");
                if ($update_room) {
                    $_SESSION['message'] = "<div class='alert alert-success'><strong> Alert! </strong> channel has been Updated Successfully!</div>";
                    header("Location: update-channel.php");
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Problem Occured while Updating Channel.</div>";
                    header("Location: update-channel.php");
                }
                
 

    }




?>
 <?php

                                            $channel = mysqli_query($connection, "SELECT * FROM channel WHERE id = $id ");
                                            
                                            if (mysqli_num_rows($channel) > 0) {

                                                while ($channel1 = mysqli_fetch_array($channel)) {

                                                    ?>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" value="<?php echo $channel1['title']; ?>" name="name" placeholder="Channel Name" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price RS</label>
                                    <input type="varchar" value="RS <?php echo $channel1['price']; ?>" name="price" placeholder="channel Price (RS)" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Channel Logo</label>
                                    <input type="file" name="picture" class="form-control" required="">
									<br>
									<label>  Current Logo</label>
									<img src="../image/<?php echo $channel1['picture']; ?>" height="100px"width="100px" alt ="cuurent photo">
												</div><?php 
												}
												}
												?>
                                <div class="form-group">
                                    <input type="submit" name="update-channel" value="update channel" class="btn btn-primary btn-block">
                                </div>
                            </form>
												
                        </div>

                    </div>

                </div>

            </div>
           
          
        </div>
       
    </div>
  
<?php include("includes/footer.php"); ?>