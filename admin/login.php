<?php include("../includes/config.php"); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Login Cable Management System</title>
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
  
</head>

<body>
   
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
   
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full" class="mt-5 pt-5">
      
        <div class="container mt-5 pt-5">
                <div class="row">
   
                    <div class="col-md-4 offset-4 shadow p-4">
                             <center><h2> Admin Login - Cable Management System</h2></center>
                        <form action="" method="POST">
                            <?php

                            if (isset($_SESSION['admin'])) {
                                header("Location: index.php");
                            }

                            // Check button is clicked
                            if (isset($_POST['loginbtn'])) {
                                
                                $email = mysqli_real_escape_string($connection, $_POST['email']);
                                $password = mysqli_real_escape_string($connection, $_POST['password']);


                                // check user match our database or not

                                $check = mysqli_query($connection, "SELECT * FROM admin WHERE email = '$email'");

                                if (mysqli_num_rows($check) > 0) {
                                    
                                    // fetch data
                                    $user = mysqli_fetch_array($check);

                                    //check user entered password and db password

                                    if ($password == $user['password']) {
                                        // here both are true, we can let user to login now.
                                        // setting email in session global variable
                                        $_SESSION['admin'] = $user['email'];

                                        // redirect to the destination here

                                        header("Location: index.php");
                                        // lets check

                                    } else {
                                        echo "<div class='alert alert-danger'>Password is incorrect!</div>";
                                    }

                                } else {
                                    echo "<div class='alert alert-danger'>Email is incorrect!</div>";
                                }

                            }

                            ?>
							
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Your Email" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Your Password" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="loginbtn" value="Login" class="btn btn-warning btn-block btn-lg text-white">
                            </div>
                    
                        </form>

                    </div>

                </div>
            </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php include("includes/footer.php"); ?>