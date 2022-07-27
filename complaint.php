<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
      
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Dashboard</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"> Complaint or Contact or Service Request</li>
                    </ol>
                </div>
            </div>
        </section>
		
					<?php
					//delete complaint
if (isset($_GET['delete'])) {
                                    
                                    $id1 = $_GET['delete'];

                                    $delete = mysqli_query($connection, "DELETE FROM complaint WHERE id = '$id1'");
                                    if ($delete) {
                                       echo "<div class='alert alert-success'><strong>Alert! </strong> Your Complaint Deleted Successfully!</div>";
                                        header("Location: complaint.php");
                                    } else {
                                       echo  "<div class='alert alert-danger'><strong>Alert! </strong> Problem occured deleting Complaint.</div>";
                                        header("Location: complaint.php");
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
				
						
						 <div class="col-md-9">
						 
						 
  
                        <form class="row contact_form" action="" method="post"  >
                            <div class="col-md-6">
							<?php

    $usercomplaint = mysqli_query($connection, "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($usercomplaint) > 0) {
    
        while ($complaint = mysqli_fetch_array($usercomplaint)) {
            ?>		<label>Basic Informations Are Not Editble . If Anything Wrong Kindly Update in Profile</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $complaint['name']; ?>"  name="name" placeholder="Enter your name" required readonly>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" value="<?php echo $complaint['email']; ?>" name="email" placeholder="Enter email address"required readonly>
                                </div>
								 <div class="form-group">
                                    <input type="number" class="form-control" value="<?php echo $complaint['phone']; ?>" name="mobile" placeholder="Enter phone number"required readonly>
                                </div>
								 <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $complaint['address']; ?>" name="address" placeholder="Enter Address"required readonly>
                                </div>
                                <div class="form-group">
								<select class="form-select" name="subject" aria-label="Default select example">
  <option selected> select Subject</option>
  <option value="Complaint">Complaint</option>
  <option value="Service Request">Service Request</option>
  <option value="Contact US">Contact US</option>
   <option value="Other">Other</option>
</select>
                                </div>
                            </div>
		<?php }
	}
		?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message"  placeholder="Enter Message"required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" name="submit" class="btn theme_btn button_hover">Send </button>
                            </div>
                        </form>
                    </div>
						
						














						
			<?php
if (isset($_POST['submit'])){

$conn = $connection;
$uid =  $_SESSION['id'];
$Name = $conn->real_escape_string($_POST['name']);
$Email_Id = $conn->real_escape_string($_POST['email']);
$Mobile_No = $conn->real_escape_string($_POST['mobile']);
$Address = $conn->real_escape_string($_POST['address']);
$Subject = $conn->real_escape_string($_POST['subject']);

$Message = $conn->real_escape_string($_POST['message']);

$query = "INSERT into complaint(name,email,mobile,subject,user_id,address,complaint) VALUES('$Name','$Email_Id','$Mobile_No','$Subject','$uid','$Address','$Message')";
$success = $conn->query($query);

 if(!$success = true ){
	 
	echo '<script>alert("Internal Server Error ")</script>'; 
	
 }
else 
{
	
	echo '<script>alert("sucessfully Sumitted .. Thanks For Contacting Us")</script>';
}

$conn->close();
}
?>			
						
						
						</div>
						</div>
						</div>
						
					
                        <div class="card p-3">
						
                            <h4>Your <span class="text-gold">Complaints</span></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
									 <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
										<th>Phone</th>
										<th>Address</th>
                                        <th>Subject</th>
										   <th>Complaint</th>
										   <th>Action</th>
										   <th><a href="complaint.php"><button class="btn btn-primary" ><i class="fa fa-refresh" aria-hidden="true"></i>  refresh</button></a></th>
                                    </thead>
                                    <tbody>
<?php

    $usercomp = mysqli_query($connection, "SELECT * FROM complaint WHERE user_id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($usercomp) > 0) {
        $inc = 1;
        while ($comp = mysqli_fetch_array($usercomp)) {
            ?>
			
            <tr>
                <td><?php echo $inc; ?></td>
                <td><?php echo $comp['name']; ?></td>
				
				 <td> <?php echo $comp['email']; ?></td>
				  <td><?php echo $comp['mobile']; ?></td>
				  
				  
                <td><?php echo $comp['address']; ?></td>
				<td><?php echo $comp['subject']; ?></td>
				<td><?php echo $comp['complaint']; ?></td>
				<td>														<a href="complaint.php?delete=<?php echo $comp['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?');">X delete complaint</a>
</td>
            </tr>
            <?php
            $inc++;
        }
    } else {
        echo "<tr><td>No Complaints Found!</td></tr>";
    }

?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  	
		
						</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		<br><br>
		<br><br>
		<br><br>
		
		 <!--================Contact Area =================-->
        <?php include("includes/footer.php"); ?>