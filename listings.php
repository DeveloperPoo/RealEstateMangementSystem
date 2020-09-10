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
                        <h3 class="breadcumb-title">CATALOG</h3>
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

    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>Search for your home</p>
                        </div>
                        <!-- Search Form -->
                        <form action="#" method="post" id="advanceSearch">
                            <div class="row">

                                

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="cities">
                                            <option>All Cities</option>
                                            <option>Riga</option>
                                            <option>Melbourne</option>
                                            <option>Vienna</option>
                                            <option>Vancouver</option>
                                            <option>Toronto</option>
                                            <option>Calgary</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="catagories">
                                            <option>All Catagories</option>
                                            <option>Apartment</option>
                                            <option>Bar</option>
                                            <option>Farm</option>
                                            <option>House</option>
                                            <option>Store</option>
                                        </select>
                                    </div>
                                </div>

                                

                                
                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select class="form-control" id="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select class="form-control" id="bathrooms">
                                            <option>Bathrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select class="form-control" id="bathrooms">
                                            <option>Hall</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select class="form-control" id="bedrooms">
                                            <option>Parking Space</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5+</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="form-group">
                                        <select class="form-control" id="bathrooms">
                                            <option>Property Price</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5+</option>
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="col-12 d-flex justify-content-between align-items-end">
                                    
                                    <!-- Submit -->
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn btn-lg" style="background-color: #4c2b00;color:white;margin-left: 850px;">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="listings-top-meta d-flex justify-content-between mb-100">
                        <div class="view-area d-flex align-items-center">
                            <span>View as:</span>
                            <div class="grid_view ml-15"><button id="first" data-toggle="tooltip" title="GALLERY VIEW" class="active" style="padding: 3px 6px;background-color: #4c2b00;color:white;"><i class="fa fa-th" aria-hidden="true"></i></a></div>
                            <div class="list_view ml-15"><button id="second" data-toggle="tooltip" title="LIST VIEW" style="padding: 3px 6px;background-color: #4c2b00;color:white;"><i class="fa fa-th-list" aria-hidden="true"></i></button></div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Featured Property -->
                <?php foreach ($property_db->getAllProperty() as $property) :?>
                <div class="col-12 col-md-6 col-xl-4">
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
                </div>
                <?php endforeach; ?>


               
            </div>

            
        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->

    
                 <?php include "footer.php" ; ?>


    <script>
                $(document).ready(function(){
                      
                        $("div.appear").hide();
                      });

                $(document).ready(function(){
                  $("button#second").click(function(){
                    $(".appear ").show();
                  });
                });

                 $(document).ready(function(){
                  $("button#first").click(function(){
                    $(".appear ").hide();
                  });
                });
                
                $(document).ready(function(){
                     $('[data-toggle="tooltip"]').tooltip();   
                });
    </script>

    
</body>

</html>