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
                        <h3 class="breadcumb-title">Blog</h3>
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

    <!-- ##### Blog Area Start ##### -->
    <section class="south-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                   
                    <!-- Single Blog Area -->
                    <div class="single-blog-area mb-50">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/blog1.jpg" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Date -->
                            <div class="post-date">
                                <a href="#">March 09, 2018</a>
                            </div>
                            <!-- Headline -->
                            <a href="#" class="headline">Retirement properties</a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>By <a href="#">Admin</a> | in <a href="#">Uncategorized</a> | <a href="#">2 Comments</a></p>
                            </div>
                            <p>Retirement properties are becoming incredibly popular as the Canadian population ages. You may want to consider a bungalow, where you still have a home and yard but no stairs. If you want to avoid maintenance and upkeep, a condo or townhome may be the right choice. They usually have good recreational facilities like a pool or gym and are close to art galleries and good restaurants. If you fancy being surrounded by others your own age in a more communal setting, a retirement community could be a good option.</p>
                            <!-- Read More btn -->
                            <a href="#" class="btn south-btn">Read More</a>
                        </div>
                    </div>
                   
                    <!-- Single Blog Area -->
                    <div class="single-blog-area mb-50">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/blog2.jpg" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Date -->
                            <div class="post-date">
                                <a href="#">March 09, 2018</a>
                            </div>
                            <!-- Headline -->
                            <a href="#" class="headline">Investment properties</a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>By <a href="#">Admin</a> | in <a href="#">Investment properties</a> | <a href="#">2 Comments</a></p>
                            </div>
                            <p>Investment properties are homes you buy to generate revenue. The important thing to keep in mind is that when you acquire an investment property, you become a landlord and that comes with responsibilities. You’ll need to familiarize yourself with the landlord-tenant act in your province, price your rent according to the market values, draft rental agreements, screen potential candidates and more.</p>
                            <!-- Read More btn -->
                            <a href="#" class="btn south-btn">Read More</a>
                        </div>
                    </div>
                   
                    <!-- Single Blog Area -->
                    <div class="single-blog-area mb-50">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/blog3.jpg" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Date -->
                            <div class="post-date">
                                <a href="#">March 09, 2018</a>
                            </div>
                            <!-- Headline -->
                            <a href="#" class="headline">Recreational properties</a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>By <a href="#">Admin</a> | in <a href="#">Recreational properties</a> | <a href="#">2 Comments</a></p>
                            </div>
                            <p>Recreational properties provide the perfect way to escape the hustle and bustle of the city and spend time with family and friends. Not only that; a cottage, chalet, cabin or piece of lakefront property is also a smart, long-term investment. Because you won’t likely live near these vacation properties, it’s important to work with a real estate agent who is familiar with the market.</p>
                            <!-- Read More btn -->
                            <a href="#" class="btn south-btn">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        <!-- Catagories Widget -->
                        <div class="featured-properties-slides owl-carousel">

                             <?php foreach ($property_db->getAllProperty() as $property) :?>
               
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
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
                        <!-- Property Content -->
                        <div class="property-content appear">
                            <h5 class="appear"><?= $property->getPropertyType() ?></h5>
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
               
                <?php endforeach; ?>
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