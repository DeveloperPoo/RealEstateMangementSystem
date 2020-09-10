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
                        <h3 class="breadcumb-title">SINGLE PROPERTY</h3>
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
  

   <!-- ##### Listings Content Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Single Listings Slides -->

                    <div class="single-listings-sliders owl-carousel">
                        
                        <?php foreach ($image_db->getAllImageOfSpecificProperty($_GET['PropertyId']) as $image) :?>
                        <!-- Single Slide -->
                            <img src="img/pro-img/<?= $image->getPhoto()?>" style="height: 500px;"/>

                         <?php endforeach; ?> 
                    </div>
                </div>
            </div>

            <?php $property = $property_db->getSingleProperty($_GET['PropertyId']);?>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="listings-content">
                        <!-- Price -->
                        <div class="list-price">
                            <p>$ <?= $property->getHousePrice();?></p>
                        </div>
                        <h5><?= $property->getPropertyType();?></h5>
                        <p class="location"><img src="img/icons/location.png" alt=""><?= $property->getStreetAddress();?> , <?= $property->getCity();?> , <?= $property->getProvince();?> , <?= $property->getCountry();?> , <?= $property->getPostalcode();?></p>
                        
                        <h5>Neighborhood:</h5>
                        <p><?= $property->getNeighborhood();?></p>
                        
                        <h5>Features:</h5>
                        <p><?= $property->getFeatures();?></p>
                        
                        <h5>Public Remarks:</h5>
                        <p><?= $property->getPublicRemarks();?></p>
                        
                        <h5>Utilities:</h5>
                        <p><?= $property->getUtilities();?></p>
                        <!-- Meta -->
                        <div class="property-meta-data d-flex align-items-end">
                            <div class="new-tag">
                                <img src="img/icons/new.png" alt="">
                            </div>
                            <div class="bathroom">
                                <img src="img/icons/bathtub.png" alt="">
                                <span><?= $property->getBathroom();?></span>
                            </div>
                            <div class="garage">
                                <img src="img/icons/garage.png" alt="">
                                <span><?= $property->getParkingSpace();?></span>
                            </div>
                            <div class="space">
                                <img src="img/icons/space.png" alt="">
                                <span><?= $property->getSizeInterior();?> sq ft</span>
                            </div>
                        </div>


                        <!-- Core Features -->
                        <ul class="listings-core-features  align-items-center">
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Bedroom : </b><?= $property->getBedroom();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Hall : </b><?= $property->getBedroom();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Balcony : </b><?= $property->getBedroom();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>SizeExterior : </b><?= $property->getBedroom();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Bedroom : </b><?= $property->getBedroom();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Pet Friendly : </b><?= $property->getPetFriendly();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Constructed Date : </b><?= $property->getConstructedDate();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Renovated Date : </b><?= $property->getRenovatedDate();?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <b>Agreement Type : </b><?= $property->getAgreementType();?></li>
                        </ul>
                        <!-- Listings Btn Groups -->
                        <div class="listings-btn-groups">
                           
                            <button type="button" class ="btn south-btn" style="background-color: #4c2b00"><a href="#" data-toggle="modal" data-target="#BookVisitModal<?= $property->getPropertyId() ?>" style="color: white;">BOOK VISIT</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact-realtor-wrapper">
                        <div class="realtor-info">
                            <img src="img/bg-img/listing.jpg" alt="">
                            <div class="realtor---info">
                                <h2><?= $property->getOwnerName();?></h2>
                                <p>Owner</p>
                                <h6><img src="img/icons/phone-call.png" alt=""> + <?= $property->getOwnerConNo();?></h6>
                                
                                
                            </div>
                            <div class="realtor--contact-form">
                               <!--  <?php $user = $user_db->getSingleUser($property->getUserId());?>
                               <?php $to = $user->getEmail();?> -->
                                
                                <form action="<?php echo $MessageController ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="realtor-name" placeholder="Your Name" name="MessagerName">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="realtor-number" placeholder="Your Number" name="MessagerNumber">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="realtor-email" placeholder="Your Mail" name="MessagerEmail">
                                    </div>
                                    <div class="form-group">
                                        <textarea  class="form-control" id="realtor-message" cols="30" rows="10" placeholder="Your Message" name="MessagerMessage"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="realtor-name" placeholder="Your Name" name="PropertyId" value="<?= $property->getPropertyId();?>">
                                    </div>
                                    <button type="submit" class="btn south-btn" name="SendMessage" style="background-color: #4c2b00;color: white;">Send Message</button>
                                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="BookVisitModal<?= $property->getPropertyId() ?>" role="dialog" style="margin-top: 100px;">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color: #4c2b00">
                                      <h4 class="modal-title" style="margin-left: 150px;color: white;">BOOK YOUR VISIT</h4>
                                      <button type="button" class="close" data-dismiss="modal" style="background-color: white;">&times;</button>
                                      
                                    </div>
                                    <div class="modal-body">
                                      
                                        <form action="<?php echo $VisitsController ?>" method="POST">
                                        <input type="hidden" name="action" value="add">
                                    
                                        <div class="form-group">
                                            <label for="uname"><b>VISIT DATE:</b></label>
                                            <input type="DATE" class="form-control" name="VisitDate" id="visitDate">
                                          </div>
                                          <div class="form-group">
                                            <label for="pass"><b>VISIT HOUR:</b></label>
                                            <input type="text" class="form-control" name="VisitHour" id="visitHour" min="0" max="24">
                                          </div>
                                          <div class="form-group">
                                            <label for="fname"><b>VISIT MINUTE:</b></label>
                                            <input type="text" class="form-control" name="VisitMinute" id="visitMinute" min="0" max="60">
                                          </div>
                                          <div class="form-group">
                                            <label for="uname"><b>VISITER EMAIL ADDRESS:</b></label>
                                            <input type="email" class="form-control" name="VisiterEmail" id="visiterEmail">
                                          </div>
                                          <div class="form-group">
                                            
                                            <input type="hidden" class="form-control" id="propertyid" name="PropertyId" value="<?= $property->getPropertyId() ?>">
                                          </div>
                                          
                                          
                                          
                                          <button type="submit" class="btn btn-success btn-block" name="addVisit">Submit</button>
                                        </form> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
              </div>
            </div>
            
        </div>
    </section>
    <!-- ##### Listings Content Area End ##### -->

    
                 <?php include "footer.php" ; ?>


    

    
</body>

</html>