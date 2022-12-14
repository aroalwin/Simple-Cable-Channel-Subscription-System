<?php include("includes/header.php"); ?>
    
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
     
        <?php include("includes/top-nav.php"); ?>
        
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
         
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Users</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            
                            <div class="table-responsive">
                                
                                <table class="table">
                                    
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Password</th>
                                        <th>Account Created Date</th>
                                    </thead>

                                    <tbody>

                                        <?php

$users = mysqli_query($connection, "SELECT * FROM users");
                                            $inc = 1;
                                            if (mysqli_num_rows($users) > 0) {

                                                while ($booking = mysqli_fetch_array($users)) {

                                                    ?>

                                                    <tr>
                                            
                                                        <td><?php echo $inc; ?></td>
                                                        <td>
                                                        	<strong><?php echo $booking['name']; ?></strong>
                                                        </td>
                                                        <td><?php echo $booking['email'] ?></td>
                                                        <td><?php echo $booking['phone'] ?></td>
                                                        <td><?php echo $booking['password'] ?></td>
                                                        <td><?php echo $booking['created_at'] ?></td>

                                                    </tr>

                                                    <?php
                                                    $inc++;
                                                }

                                            } else {

                                                echo "<tr class='text-center'><td colspan='6'>No Data Found!</td></tr>";
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