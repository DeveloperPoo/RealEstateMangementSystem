<?php include "header.php" ; ?>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <?php include "navbar.php" ; ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Contact</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-<?php echo $_SESSION['msgType'] ?>">
                    <strong><?php echo $_SESSION['msgType'] ?>!</strong> <?= $_SESSION['msg']; ?>
                </div>
            <?php endif; ?>

    <section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Contact info</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Office Hours -->
                        <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 05 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 04 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address mt-30">
                            <h6><img src="img/icons/phone-call.png" alt="">+1 514 969 5411</h6>
                            <h6><img src="img/icons/envelope.png" alt=""> shelterhuntadvisor@gmail.com</h6>
                            <h6><img src="img/icons/location.png" alt=""> 1616 René-Lévesque Blvd W,H3H 1P8<br>Montreal, Quebec</h6>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <form action="<?php echo $FeedbackController ?>" method="POST">
                            <input type="hidden">
                            <div class="form-group">
                                <input type="text" class="form-control" name="FeedbackerName" id="contact-name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="FeedbackerNumber" id="contact-number" placeholder="Your Phone">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="FeedbackerEmail" id="contact-email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="FeedbackerMessage" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn south-btn" name="addFeedback" style="background-color: #4c2b00;color: white;">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="mapouter"><div class="gmap_canvas"><iframe width="1100" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=1616%20Ren%C3%A9-L%C3%A9vesque%20Blvd%20W%2C%20Montreal%2C%20Quebec%20H3H%201P8&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://thevpndeal.com/nordvpn-coupon/">nordvpn coupon</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:1100px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1100px;}</style></div>
                </div>
            </div>
        </div>
    </div>

   
          <?php include "footer.php" ; ?>

    <!-- Google Maps -->

  <!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script> -->
    <script src="js/map-active.js"></script>

</body>

</html>
