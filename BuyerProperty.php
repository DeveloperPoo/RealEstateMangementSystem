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
                        <h3 class="breadcumb-title">Property List</h3>
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
    <section class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
              
 
                              
            </div>
            

            <div class="row" style="margin-top: 50px;">

                <!-- Single Featured Property -->
                <!-- <?php var_dump($_SESSION['id']);?> -->
                <?php foreach ($property_db->getAllPropertyExceptUser(implode($_SESSION['id'])) as $property) :?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="img/bg-img/feature1.jpg" alt="">

                            <div class="tag">
                                <span><a href="BuyerSingleProperty.php?PropertyId=<?= $property->getPropertyId()?>" style="color: white;">EXPAND</a></span>
                                <?php $alert = $alert_db->getSingleAlertId($property->getPropertyId(),implode($_SESSION['id']));?>

                                <?php if(!empty($alert->getAlertId())):?>
                                   
                                
                               
                                <span style="margin-left: 250px;"><button type="submit" class="btn btn-sm"  style="width: 20px;"><a href="<?php echo $AlertController ?>?action=ban&Alertid=<?= $alert->getAlertId() ?>" onclick="return confirm('Are you sure you want to remove it from your wishlist')" style="color: white;"><i class="material-icons" style="font-size:34px;color: white;margin-left: -15px;margin-top: -5px;" data-toggle="tooltip" title="REMOVE FROM WISH LIST">favorite</i></a></button></span>


                                <?php endif;?>
                                <?php if(empty($alert->getAlertId())):?>
                                <form action="<?php echo $AlertController ?>" method="POST">
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" class="form-control" name="PropertyId" id="propertyId" value="<?= $property->getPropertyId() ?>">
                                        <input type="hidden" class="form-control" name="UserId" id="userId" value="<?= implode($_SESSION['id']) ?>"> 
                                
                                                               
                                <span style="margin-left: 250px;"><button type="submit" class="btn btn-sm" name="addAlert" style="width: 20px;"><i class="material-icons" style="font-size:34px;color: white;margin-left: -15px;margin-top: -5px;" data-toggle="tooltip" title="ADD TO WISH LIST">favorite_border</i></button></span>
                                
                                </form>  
                                <?php endif;?>

                            </div>
                            <div class="list-price">
                                <p> $ <?= $property->getHousePrice() ?></p>
                            </div>
                        </div>
                        <!-- Property Content -->
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
                            <div class="property-meta-data d-flex align-items-end justify-content-between" style="margin-top: 20px;">

                               <button type="button"class ="btn btn-block" style="margin-left: 155px;background-color: #4c2b00;color: white;"><a href="<?php echo $PropertyController ?>?action=buy&PropertyId=<?= $property->getPropertyId() ?>&UserId=<?= implode($_SESSION['id']) ?>" onclick="return confirm('Are you sure you want to BUY <?= $property->getPropertyId() ?>')" style="color: white;">BUY</a></button>
                          </div>

                    
             
                             
                        </div>

                          </div>
                    </div>       
                           
                  
                <?php endforeach; ?>


               
            </div>

        </div>

    </section>
    <!-- ##### Blog Area End ##### -->

        <?php include "footer.php" ; ?>

 
</body>

</html>