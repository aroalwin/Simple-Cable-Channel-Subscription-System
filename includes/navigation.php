<header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><h3>CABLE TV MANAGEMENT SYSTEM</h3></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="channel.php">Channel List</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                                <ul class="dropdown-menu">
                                    <?php
                                        if (isset($_SESSION['id'])) {
                                            ?>
                                            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                                            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                                            <?php
                                        }
                                    ?>
                                    
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>