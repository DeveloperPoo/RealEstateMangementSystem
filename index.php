<?php include "header.php" ; ?>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <?php include "navbar.php" ; ?>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your home</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your dream house</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero3.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your perfect house</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Featured Properties</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php foreach ($visits_db->getAllRecentVisits() as $visit) :?>
                   
                <!-- Single Featured Property -->
                <?php $property = $property_db->getSingleProperty($visit->getPropertyId())?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50">
                       
                        <div class="property-thumb">
                            <img src="img/bg-img/feature1.jpg" alt="">
                            <div class="tag">
                                <span><a href="SingleProperty.php?PropertyId=<?= $property->getPropertyId()?>" style="color: white;">EXPAND</a></span>
                                <span style="margin-left: 250px;"><a href="login.php"><i class="material-icons" style="font-size:34px;color: white;" data-toggle="tooltip" title="ADD TO WISH LIST">favorite_border</i></a></span>
                            </div>
                            <div class="list-price">
                                <p>$ <?= $property->getHousePrice() ?></p>
                            </div>
                        </div>
                       
                        <div class="property-content">
                            <h5><?= $property->getPropertyType() ?></h5>
                            <p class="location"><img src="img/icons/location.png" alt=""><?= $property->getStreetAddress() ?></p>
                            <p><?= $property->getPublicRemarks() ?>.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="img/icons/bathtub.png" alt="">
                                    <span><?= $property->getBathroom() ?></span>
                                </div>
                                <div class="garage">
                                    <img src="img/icons/garage.png" alt="">
                                    <span><?= $property->getParkingSpace() ?></span>
                                </div>
                                <div class="space">
                                    <img src="img/icons/space.png" alt="">
                                    <span><?= $property->getSizeInterior() ?> sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">Montreal's European feel and diverse culture is sure to win you over as you search for your next home.</h6>
                        <a href="listings.php" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <section class="south-testimonials-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                        <h2>Client testimonials</h2>
                        <p>REVIEW OF YOUR PRECIOUS CUSTOMERS.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                        <?php foreach ($feedback_db->getAllFeedback() as $feedback) :?>
                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                          <!--   <h5><?= $feedback->getFeedbackerName()?></h5> -->
                            <p><?= $feedback->getFeedbackerMessage()?>.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p><?= $feedback->getFeedbackerName()?>, <span>Customer</span></p>
                                 <p><?= $feedback->getFeedbackerEmail()?>, <span><?= $feedback->getFeedbackerNumber()?></span></p>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonials Area End ##### -->

    <!-- ##### Editor Area Start ##### -->
    <section class="south-editor-area d-flex align-items-center">
        <!-- Editor Content -->
        <div class="editor-content-area">
            <!-- Section Heading -->
            <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                <img src="img/icons/prize.png" alt="">
                <h2>Pooja Thakkar</h2>
                <p>Realtor</p>
            </div>
            <p class="wow fadeInUp" data-wow-delay="500ms">Buying a home is likely the most significant and largest purchase of your life. Do it right with the help of a SHELTER HUNT and avoid regretting taking on more than you should. It’s ideal to have saved up some money and manage any debt. In a couple steps, you can determine how much you can afford.Markets go up, markets go down and even the most informed experts can’t accurately predict when a market will peak or bottom out. If you’re buying a home as a long-term investment (and for long-term enjoyment), you should be protected from short-term changes in the market. Instead, focus on picking a home that meets your and your family’s needs.</p>
            <div class="address wow fadeInUp" data-wow-delay="750ms">
                <h6><img src="img/icons/phone-call.png" alt=""> +1 514 969 5411</h6>
                <h6><img src="img/icons/envelope.png" alt=""> shelterhuntadvisor@gmail.com</h6>
            </div>
            <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
             
            </div>
        </div>

        <!-- Editor Thumbnail -->
        <div class="editor-thumbnail">
            <img src="img/bg-img/team2.jpg" alt="" style="height: 750px;">
        </div>
    </section>
    <!-- ##### Editor Area End ##### -->

    <?php include "footer.php" ; ?>

</body>

</html>

    

