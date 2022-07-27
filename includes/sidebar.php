<?php

	if(isset($_SESSION['id'])) {
		
	} else {
		header("Location: login.php");
	}

?>
<ul class="list-group">
    <li class="list-group-item"><a href="dashboard.php" class="text-dark">Dashboard</a></li>
    <li class="list-group-item"><a href="your-subscription.php" class="text-dark">Channel Subscription</a></li>
	    <li class="list-group-item"><a href="complaint.php" class="text-dark">Complaints</a></li>
    <li class="list-group-item"><a href="profile.php" class="text-dark">Profile</a></li>
    <li class="list-group-item"><a href="logout.php" class="text-dark">Logout</a></li>
</ul>