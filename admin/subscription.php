<?php include("includes/header.php"); ?>
    
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
       
        <?php include("includes/top-nav.php"); ?>
        
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
        
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Subscription</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Subscription</li>
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
                                        <th>User name / Email</th>
                                        <th>Channel Name</th>
										 <th>Price</th>
										  <th>Channel Photo</th>
                                        <th>Subscription Date</th>
                                    </thead>

                                    <tbody>

                                        <?php

$subscription = mysqli_query($connection, "
	SELECT  
		subscription.user_id, 
		subscription.channel_id,
		subscription.title, 
		subscription.booking_date, 
		users.id, 
		users.name, 
		users.email 
	FROM 
		subscription 
	INNER JOIN 
		users 
	ON 
	subscription.user_id = users.id
");
                                            $inc = 1;
                                            if (mysqli_num_rows($subscription) > 0) {

                                                while ($booking = mysqli_fetch_array($subscription)) {

                                                    ?>
													
													

                                                    <tr>
                                            
                                                        <td><?php echo $inc; ?></td>
                                                        <td>
                                                        	<strong><?php echo $booking['name']; ?></strong>
                                                        	<br>
                                                        	<?php echo $booking['email'] ?>
                                                        </td>
                                                        <td><?php echo $booking['title'] ?></td>
														<?php 
														$id=$booking['channel_id'];

$sql=mysqli_query($connection,"select * from channel WHERE id = $id");
while($res=mysqli_fetch_assoc($sql))
{
	
;	


?>
														  <td>RS  <?php echo $res['price'] ?></td>
														  <td><img src="../image/<?php echo $res['picture'] ?>"height="60px" width="60px"></td>
														  
<?php }?>
                                                        <td><?php echo $booking['booking_date'] ?></td>

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