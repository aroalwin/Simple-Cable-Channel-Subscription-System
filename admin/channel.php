<?php include("includes/header.php"); ?>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    
        <?php include("includes/top-nav.php"); ?>
        
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Channel</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Channel</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="card">
                            <?php

                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }


                                if (isset($_GET['delete'])) {
                                    
                                    $id = $_GET['delete'];

                                    $delete = mysqli_query($connection, "DELETE FROM channel WHERE id = '$id'");
                                    if ($delete) {
                                        $_SESSION['message'] = "<div class='alert alert-success'><strong>Alert! </strong> channel Deleted Successfully!</div>";
                                        header("Location: channel.php");
                                    } else {
                                        $_SESSION['message'] = "<div class='alert alert-danger'><strong>Alert! </strong> Problem occured deleting channel.</div>";
                                        header("Location: channel.php");
                                    }
                                }

                            ?>
                            <div class="table-responsive">
                                
                                <table class="table">
                                    
                                    <thead>
                                        <th>#</th>
                                        <th>Channel Photo</th>
                                        <th>Channel Name</th>
                                        <th>Channel Price</th>
                                    </thead>

                                    <tbody>

                                        <?php

                                            $channel = mysqli_query($connection, "SELECT * FROM channel ORDER BY id DESC");
                                            $inc = 1;
                                            if (mysqli_num_rows($channel) > 0) {

                                                while ($channel1 = mysqli_fetch_array($channel)) {

                                                    ?>

                                                    <tr>
                                            
                                                        <td><?php echo $inc; ?></td>
                                                        <td>
                                                            <img src="../image/<?php echo $channel1['picture']; ?>" alt="<?php echo $channel1['title']; ?>" style="width: 100px;" class="mb-3">
                                                            <br>
                                                            
														<a href="channel.php?delete=<?php echo $channel1['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?');">X delete channel</a>
                                                      <a href="update-channel.php?id=<?php echo $channel1['id']; ?>" class="btn btn-success btn-xs" > ✔update Channel</a>

													  </td>
                                                        <td><?php echo $channel1['title']; ?></td>
                                                        <td>RS  <?php echo $channel1['price']; ?></td>
                                                            
                                                    </tr>

                                                    <?php
                                                    $inc++;
                                                }

                                            } else {

                                                echo "<tr class='text-center'><td colspan='4'>No Data Found!</td></tr>";
                                            }

                                        ?>
                                        
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
          
        </div>
       
    </div>
   
<?php include("includes/footer.php"); ?>