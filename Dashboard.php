<?php include "header.php" ; ?>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <?php include "UserNav.php" ; ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">User Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <!-- <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-<?php echo $_SESSION['msgType'] ?>">
                    <strong><?php echo $_SESSION['msgType'] ?>!</strong> <?= $_SESSION['msg']; ?>
                </div>
            <?php endif; ?> -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">

                    <div class="single-blog-area">
                          
                      <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                        <?php foreach ($message_db->getAllMessage() as $message) :?>
                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                          
                            <p><?= $message->getMessagerMessage()?>.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Property Id , <span><?= $message->getPropertyId()?></span></p>
                                <p><?= $message->getMessagerName()?>, <span>Customer</span></p>
                                 <p><?= $message->getMessagerEmail()?>, <span><?= $message->getMessagerNumber()?></span></p>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
                   </div> 
               </div>
               
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

        <?php include "footer.php" ; ?>

 
</body>

</html>