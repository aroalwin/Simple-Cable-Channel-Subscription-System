<?php include("includes/header.php"); ?>
    
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
     
        <?php include("includes/top-nav.php"); ?>
        
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
         
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Complaint</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">View Complaints</li>
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
                                        <th>Subject</th>
                                        <th>Address</th>
										<th>Complaint</th>
                                    </thead>

                                    <tbody>

                                        <?php

$complaint = mysqli_query($connection, "SELECT * FROM complaint");
                                            $inc = 1;
                                            if (mysqli_num_rows($complaint) > 0) {

                                                while ($comp = mysqli_fetch_array($complaint)) {

                                                    ?>

                                                    <tr>
                                            
                                                        <td><?php echo $inc; ?></td>
                                                        <td>
                                                        	<strong><?php echo $comp['name']; ?></strong>
                                                        </td>
                                                        <td><?php echo $comp['email'] ?></td>
                                                        <td><?php echo $comp['mobile'] ?></td>
                                                        <td><?php echo $comp['subject'] ?></td>
                                                        <td><?php echo $comp['address'] ?></td>
														    <td><?php echo $comp['complaint'] ?></td>

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