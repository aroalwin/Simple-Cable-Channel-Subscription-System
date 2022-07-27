<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
      
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Dashboard</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </section>
<?php
if (isset($_GET['delete'])) {
                                    
                                    $id = $_GET['delete'];

                                    $delete = mysqli_query($connection, "DELETE FROM subscription WHERE id = '$id'");
                                    if ($delete) {
                                        $_SESSION['message'] = "<div class='alert alert-success'><strong>Alert! </strong> Subscribed channel Deleted Successfully!</div>";
                                        header("Location: your-subscription.php");
                                    } else {
                                        $_SESSION['message'] = "<div class='alert alert-danger'><strong>Alert! </strong> Problem occured deleting channel.</div>";
                                        header("Location: your-subscription.php");
                                    }
                                }


?>
        <section class="contact_area section_gap" style="padding-top:60px;padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include("includes/sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card p-3">
                            <h4>Your <span class="text-gold">Subscriptions</span></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>Channel</th>
										<th>Price</th>
										<th>Channel Image</th>
                                        <th>Subscription Date</th>
										   <th>Cancel Subscription</th>
                                    </thead>
                                    <tbody>
<?php

    $usersubscription = mysqli_query($connection, "SELECT * FROM subscription WHERE user_id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($usersubscription) > 0) {
        $inc = 1;
        while ($subscription = mysqli_fetch_array($usersubscription)) {
            ?>
			
            <tr>
                <td><?php echo $inc; ?></td>
                <td><?php echo $subscription['title']; ?></td>
				<?php 
														$id=$subscription['channel_id'];

$sql=mysqli_query($connection,"select * from channel WHERE id = $id");
while($res=mysqli_fetch_assoc($sql))
{
	
;	


?>
				 <td>RS  <?php echo $res['price']; ?></td>
				  <td><img src="image/<?php echo $res['picture']; ?>" height="100px" width="100px"></td>
				  
				  <?php
}
?>
                <td><?php echo $subscription['booking_date']; ?></td>
				<td>														<a href="your-subscription.php?delete=<?php echo $subscription['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?');">X delete channel</a>
</td>
            </tr>
            <?php
            $inc++;
        }
    } else {
        echo "<tr><td>No Subscription Found!</td></tr>";
    }

?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        <?php include("includes/footer.php"); ?>