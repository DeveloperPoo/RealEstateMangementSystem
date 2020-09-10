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
                        <h3 class="breadcumb-title">SINGLE PROPERTY</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
   
  <?php $property = $property_db->getSingleProperty($_GET['PropertyId']);?>

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

            

            <div class="row justify-content-center">
                <div class="col-12 col-lg-5" >
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
                        <ul class="listings-core-features   align-items-center">
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
                      
                          <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#BuyModal<?= $_GET['PropertyId'] ?>" style="background-color: #4c2b00;color: white;padding: 14px 40px;">BUY PROPERTY</button>

                        </div>


                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-7">
                    <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Available Rooms </h2>


                        <table class="table table-striped" style="background-color: white;margin-top: 30px;">
                          <thead>
                            <tr>
                              <th style="width: 10px;"> #</th>
                              <th style="width: 150px;"> Room Type</th>
                              <th style="width: 50px;"> Room Width</th>
                              <th style="width: 50px;"> Room Length</th>
                              <th style="width: 50px;"> Dimension</th>
                              <th style="width: 50px;"> Edit</th>
                              <th style="width: 50px;"> Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($room_db->getAllRoomByUser($_GET['PropertyId']) as $rooms) :?>
                              <?php if (isset($rooms)) :?>
                            <tr>
                              <td><?= $rooms->getRoomId() ?></td>
                              <td><?= $rooms->getRoomType() ?></td>
                              <td><?= $rooms->getRoomWidth() ?></td>
                              <td><?= $rooms->getRoomLength() ?></td>
                              <td><?= $rooms->getDimension() ?></td>

                             

                            </tr>
                              
                            
                                       
                              <?php endif;?>  
                            <?php endforeach; ?>
                          </tbody>
                        </table>


                    </div>
                    
                        

                    <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Check Visit List</h2>


                        <table class="table table-striped" style="background-color: white;margin-top: 30px;">
                          <thead>
                            <tr>
                              <th style="width: 50px;"> #</th>
                              <th style="width: 150px;"> Visit Date</th>
                              <th style="width: 90px;"> Visit Time</th>
                              <th style="width: 150px;"> Visiter Email</th>
                              

                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($visits_db->getAllVisitsByUser($_GET['PropertyId']) as $visits) :?>
                              <?php if (isset($visits)) :?>
                            <tr>
                              <td><?= $visits->getVisitId() ?></td>
                              <td><?= $visits->getVisitDate() ?></td>
                              <td><?= $visits->getVisitHour() ?> : <?= $visits->getVisitMinute() ?> </td>
                              <td><?= $visits->getVisiterEmail() ?></td>
                              
                              
                              
                            </tr>         
                             <?php endif;?>  
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Images</h2>
                        <div class="row">

                          <?php foreach ($image_db->getAllImageOfSpecificProperty($property->getPropertyId()) as $image) :?>
                            <?php if(isset($image)):?>
                          <div class="col-sm-4" style="margin-left: 75px;margin-top: 20px;">
                            <a href="img/pro-img/<?= $image->getPhoto()?>"> 
                              <img src="img/pro-img/<?= $image->getPhoto()?>" style ="height: 200px;width: 200px;border-style: solid;border-color: black;" class="img-fluid mb-2"/> 
                            </a>
                            <label for="uname" style="color: white;"><b>IMAGE DESCRIPTION:</b></label>
                            <input type="text" class="form-control" name="Description" id="description" value="<?php echo $image->getDescription();?>" disabled style="margin-bottom: 10px;">

                
                            
                          </div>
                        <?php endif;?>
                          <?php endforeach; ?>
                         </div>
                                
                        
                            </div> 
                    
              </div>
              </div>


                </div>
                 <div class="modal fade" id="BuyModal<?= $_GET['PropertyId']?>" role="dialog" style="margin-top: 100px;">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                   <div class="modal-header" style="background-color: #4c2b00">
                                     <h4 class="modal-title" style="margin-left: 150px;color: white;">ADD BUYER DETAILS</h4>
                                     <button type="button" class="close" data-dismiss="modal" style="background-color: white;">&times;</button>
                                     
                                   </div>
                                   <div class="modal-body">
                                       <form action="<?php echo $BuyerController ?>" method="POST">
                                       <input type="hidden" name="action" value="add">
                                       <input type="hidden" name="PropertyId" value="<?= $property->getPropertyId() ?>">
                                       <div class="form-group">
                                           <label for="uname"><b>BUYER EMAIL:</b></label>
                                           <input type="text" class="form-control" name="BuyerEmail" id="buyerEmail">
                                         </div>
                                         <div class="form-group">
                                           <label for="pass"><b>BUYER PRICE:</b></label>
                                           <input type="text" class="form-control" name="BuyerPrice" id="buyerPrice">
                                         </div>
                                         
                                         <div class="form-group">
                                           <input type="hidden" class="form-control" name="UserId" id="userId" value="<?= implode($_SESSION['id']); ?>">
                                         </div> 
                             
                                       
                                       <button type="submit" class="btn-sm" name="add Buyer" style="padding: 14px 40px;color: white;background-color:#4c2b00;">SUBMIT</button>
                                     </form>
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