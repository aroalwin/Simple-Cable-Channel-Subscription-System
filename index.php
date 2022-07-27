<?php include("includes/header.php"); ?>
        <!--================Header Area =================-->
        <?php include("includes/navigation.php"); ?>
        <!--================Header Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>Cable Management System</h6>
						<h2>Relax Your Mind By Watching Movies etc..</h2>
						<p>If you are looking for good tv  cable operator ?<br> Your Are In Correct place. We Offer Cable Channel In Low Price  </p>
						<a href="channel.php" class="btn theme_btn button_hover">Check Channels</a>
					</div>
				</div>
            </div>
        </section>
        <!--================Banner Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Newly Added Channels</h2>
                    <p>New Channels  </p>
                </div>
                <div class="row mb_30">
                    <?php
                        $getchannel = mysqli_query($connection, " SELECT * FROM (
     SELECT * FROM channel ORDER BY id DESC LIMIT 4 )Var1 ORDER BY id ASC;");
                        if (mysqli_num_rows($getchannel) > 0) {
                            while ($channel = mysqli_fetch_array($getchannel)) {
                            
                            ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="accomodation_item text-center">
                                        <div class="hotel_img">
                                            <img src="image/<?php echo $channel['picture']; ?>" alt="" style="width: 263px;height: 270px;">
                                            <a href="channel.php?book=<?php echo$channel['id']; ?>&title=<?php echo$channel['title']; ?>" class="btn btn-danger button_hover">Subscribe</a>
                                        </div>
                                        <a href="#"><h4 class="sec_h4"><?php echo$channel['title']; ?></h4></a>
                                        <h5>RS <?php echo$channel['price']; ?><small>/Month</small></h5>
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
       
        
        
        
<?php include("includes/footer.php"); ?>