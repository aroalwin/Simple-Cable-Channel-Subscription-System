<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Channels</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Channels</li>
                    </ol>
                </div>
            </div>
        </section>
        
        <section class="accomodation_area section_gap">
            <div class="container">

                    <?php

                        if (isset($_SESSION['message'])) {
                            ?>  
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['message']);
                        }



                    ?>

                <div class="row mb_30">

                    <?php
                        $getchannel = mysqli_query($connection, "SELECT * FROM channel");
                        if (mysqli_num_rows($getchannel) > 0) {
                            while ($channel = mysqli_fetch_array($getchannel)) {
                            
                            ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="accomodation_item text-center">
                                    <div class="hotel_img">
                                        <img src="image/<?php echo $channel['picture']; ?>" alt=""style="width: 263px;height: 270px;">
                                        <a href="channel.php?book=<?php echo $channel['id']; ?>&title=<?php echo $channel['title']; ?>" class="btn btn-danger button_hover">Subscribe</a>
                                    </div>
                                    <a href="#"><h4 class="sec_h4"><?php echo $channel['title']; ?></h4></a>
                                    <h5>RS <?php echo $channel['price']; ?><small>/Month</small></h5>
                                </div>
                            </div>
                            <?php
                            }
                        } else {
                            echo "<div class='col-md-12 text-center'><h4>No Channel Available.</h4></div>";
                        }
                    ?>
                            
                </div>
            </div>
        </section>
        
<?php

            // echo $today = date("Y-m-d");
    if (isset($_GET['book']) AND isset($_GET['title'])) {
        
        if (isset($_SESSION['id'])) {
            
            $userid = $_SESSION['id'];

            $channelid = $_GET['book'];

            $title = $_GET['title'];
            $today = date("Y-m-d");
           

                $book = mysqli_query($connection, "

                    INSERT 
                        INTO 
                            subscription
                                (
                                    user_id, 
                                    channel_id, 
                                    title, 
                                    booking_date
                                )
                            VALUES
                                (
                                '$userid', 
                                '$channelid', 
                                '$title', 
                                now()
                                )

                    ");

                $_SESSION['message'] = "<div class='alert alert-success'><strong> Alert! </strong> Channel has been Subscribed Successfully!</div> <br><div class='alert alert-warnning'><h3> info! </h3> Channel Cost Will  Collected With In 24 hr. Our Agent Will Collect The Charge At Your Door Step</div>";
                header("Location: channel.php");
 
            

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Please Login to Subscribe Channel!</div>";
            header("Location: channel.php");
        }

    }





?>

<?php include("includes/footer.php"); ?>