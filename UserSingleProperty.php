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
                      
                          <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#editModal<?= $_GET['PropertyId'] ?>" style="background-color: #4c2b00;color: white;padding: 14px 40px;">EDIT PROPERTY</button>

                        </div>


                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-7">

                  <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Requested Buyers </h2>


                        <table class="table table-striped" style="background-color: white;margin-top: 30px;">
                          <thead>
                            <tr>
                              <th style="width: 10px;"> #</th>
                              <th style="width: 150px;"> Buyer Email</th>
                              <th style="width: 50px;"> Buyer Price</th>
                              <th style="width: 50px;"> User ID</th>
                              <th style="width: 50px;"> Buyer Status</th>
                              <th style="width: 100px;"> Request</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($buyer_db->getAllBuyerByUser($_GET['PropertyId']) as $buyer) :?>
                              <?php if (isset($buyer)) :?>
                            <tr>
                              <td><?= $buyer->getBuyerId() ?></td>
                              <td><?= $buyer->getBuyerEmail() ?></td>
                              <td><?= $buyer->getBuyerPrice() ?></td>
                              <td><?= $buyer->getUserId() ?></td>
                              <td><?= $buyer->getStatus() ?></td>
                              <td><?php if(($buyer->getStatus())==0):?><button type="button"class ="btn btn-sm btn-dark"><a href="<?php echo $BuyerController ?>?action=accept&BuyerId=<?= $buyer->getBuyerId() ?>&BuyerEmail=<?= $buyer->getBuyerEmail() ?>&PropertyId=<?= $property->getPropertyId() ?>" onclick="return confirm('Are you sure you want to ACCEPT BUYING REQUEST for PROPERTY ID : <?= $property->getPropertyId() ?>.')" style="color: white;">Accept</a></button><?php endif; ?>
                              <?php if(($buyer->getStatus())==1):?><button type="button"class ="btn btn-sm btn-dark"><a href="<?php echo $BuyerController ?>?action=decline&BuyerId=<?= $buyer->getBuyerId() ?>&BuyerEmail=<?= $buyer->getBuyerEmail() ?>&PropertyId=<?= $property->getPropertyId() ?>" onclick="return confirm('Are you sure you want to DECLINE BUYING REQUEST for PROPERTY ID : <?= $property->getPropertyId() ?>.')" style="color: white;">Decline</a></button><?php endif; ?></td>
                             

                            </tr>
                              
                            
                                       
                              <?php endif;?>  
                            <?php endforeach; ?>
                          </tbody>
                        </table>


                    </div>
                    <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Available Rooms  <button type="button"  class=" btn btn-lg btn-primary " data-toggle="modal" data-target="#addModal" style="margin-left: 300px;">ADD</button>
                        </h2>


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

                              <td><button type="button"class ="btn btn-sm btn-dark"><a href="#" data-toggle="collapse"  data-target="#editModalRoom<?= $rooms->getRoomId() ?>" style="color: white;">EDIT</a></button></td>

                              <td><button type="button"class ="btn btn-sm btn-dark"><a href="<?php echo $RoomController ?>?action=delete&RoomId=<?= $rooms->getRoomId() ?>" onclick="return confirm('Are you sure you want to DELETE <?= $rooms->getRoomId() ?>')" style="color: white;">DELETE</a></button></td>

                            </tr>
                              
                            <tr id="editModalRoom<?= $rooms->getRoomId() ?>" class="collapse fade">
                            <td colspan="7" style="border: solid;">
                              <form action="<?php echo $RoomController ?>" method="POST">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="RoomId" value="<?= $rooms->getRoomId() ?>">
                                 <input type="hidden" name="PropertyId" value="<?= $rooms->getPropertyId() ?>">
                                <table>
                                  <tbody>
                                    <tr>
                                      <td><input type="text"  name="RoomType" id="roomtype" value="<?= $rooms->getRoomType() ?>" style="width: 150px;" style="width: 20px;" ></td>
                                      <td><input type="text"  name="RoomWidth" id="roomwidth" value="<?= $rooms->getRoomWidth() ?>" style="width: 50px;"></td>
                                      <td><input type="text"  name="RoomLength" id="roomlength" value="<?= $rooms->getRoomLength() ?>" style="width: 50px;"></td>
                                      <td><input type="text"  id="dimension" name="Dimension" value="<?= $rooms->getDimension() ?>" style="width: 50px;"></td>
                                      <td><button type="submit" class="btn-sm" name="editRoom" style="color: white;background-color:#4c2b00;">SUBMIT</button></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </form>
                
                            </td>
                            </tr>
                                       
                              <?php endif;?>  
                            <?php endforeach; ?>
                          </tbody>
                        </table>


                    </div>
                    <div class="modal fade" id="addModal" role="dialog" style="margin-top: 100px;">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color: #4c2b00">
                                      <h4 class="modal-title" style="margin-left: 150px;color: white;">ADD ROOM</h4>
                                      <button type="button" class="close" data-dismiss="modal" style="background-color: white;">&times;</button>
                                      
                                    </div>
                                    <div class="modal-body">
                                      
                                        <form action="<?php echo $RoomController ?>" method="POST">
                                        <input type="hidden" name="action" value="add">
                                    
                                        <div class="form-group">
                                            <label for="uname"><b>ROOM TYPE:</b></label>
                                            <input type="text" class="form-control" name="RoomType" id="roomtype">
                                          </div>
                                          <div class="form-group">
                                            <label for="pass"><b>ROOM WIDTH:</b></label>
                                            <input type="text" class="form-control" name="RoomWidth" id="roomwidth">
                                          </div>
                                          <div class="form-group">
                                            <label for="fname"><b>ROOM LENGTH:</b></label>
                                            <input type="text" class="form-control" name="RoomLength" id="roomlength">
                                          </div>
                                          <div class="form-group">
                                            <label for="lname"><b>DIMENSION:</b></label>
                                            <input type="text" class="form-control" id="dimension" name="Dimension">
                                          </div>
                                          <div class="form-group">
                                            <input type="hidden" class="form-control" name="PropertyId" id="properId" value="<?= $property->getPropertyId() ?>">
                                          </div> 
                                          
                                          
                                          <button type="submit" class="btn btn-success btn-block" name="addRoom">Submit</button>
                                        </form> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                        </div>

                    <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Check Visit List</h2>


                        <table class="table table-striped" style="background-color: white;margin-top: 30px;">
                          <thead>
                            <tr>
                              <th style="width: 50px;"> #</th>
                              <th style="width: 150px;"> Visit Date</th>
                              <th style="width: 90px;"> Visit Time</th>
                              <th style="width: 90px;"> Visiter Email</th>
                              <th style="width: 80px;"> Visit Status</th>
                              <th style="width: 100px;"> Visit Requested</th>

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
                              <td><?= $visits->getVisitStatus() ?></td>
                              <td><?php if(($visits->getVisitStatus())==0):?><button type="button"class ="btn btn-sm btn-dark"><a href="<?php echo $VisitsController ?>?action=accept&VisitId=<?= $visits->getVisitId() ?>&VisiterEmail=<?= $visits->getVisiterEmail() ?>" onclick="return confirm('Are you sure you want to ACCEPT REQUESTED VISIT for PROPERTY ID : <?= $property->getPropertyId() ?>.')" style="color: white;">Accept</a></button><?php endif; ?>
                              <?php if(($visits->getVisitStatus())==1):?><button type="button"class ="btn btn-sm btn-dark"><a href="<?php echo $VisitsController ?>?action=decline&VisitId=<?= $visits->getVisitId() ?>&VisiterEmail=<?= $visits->getVisiterEmail() ?>" onclick="return confirm('Are you sure you want to DECLINE REQUESTED VISIT for PROPERTY ID : <?= $property->getPropertyId() ?>.')" style="color: white;">Decline</a></button><?php endif; ?></td>
                              
                            </tr>         
                             <?php endif;?>  
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="contact-realtor-wrapper" style="border: solid;background-color: #4c2b00;">
                        <h2 style="background-color: white;"> Images  <button type="button"  class=" btn btn-lg btn-primary " data-toggle="modal" data-target="#addModalImage" style="margin-left: 430px;">ADD</button>
                        </h2>
                        <div class="row">

                          <?php foreach ($image_db->getAllImageOfSpecificProperty($property->getPropertyId()) as $image) :?>
                            <?php if(isset($image)):?>
                          <div class="col-sm-4" style="margin-left: 75px;margin-top: 20px;">
                            <a href="img/pro-img/<?= $image->getPhoto()?>"> 
                              <img src="img/pro-img/<?= $image->getPhoto()?>" style ="height: 200px;width: 200px;border-style: solid;border-color: black;" class="img-fluid mb-2"/> 
                            </a>
                            <label for="uname" style="color: white;"><b>IMAGE DESCRIPTION:</b></label>
                            <input type="text" class="form-control" name="Description" id="description" value="<?php echo $image->getDescription();?>" disabled style="margin-bottom: 10px;">

                      
                           
                                              <button type="button"class ="btn btn-sm btn-dark" style="margin-left:50px;"><a href="<?php echo $ImageController ?>?action=delete&ImageId=<?= $image->getImageId() ?>" onclick="return confirm('Are you sure you want to DELETE <?= $image->getImageId() ?>')" style="color: white;">DELETE</a></button> 
                            
                          </div>
                        <?php endif;?>
                          <?php endforeach; ?>
                         </div>
                                
                        
                            </div> 
                    <div class="modal fade" id="addModalImage" role="dialog" style="margin-top: 100px;">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color: #4c2b00">
                                      <h4 class="modal-title" style="margin-left: 150px;color: white;">ADD IMAGE</h4>
                                      <button type="button" class="close" data-dismiss="modal" style="background-color: white;">&times;</button>
                                      
                                    </div>
                                    <div class="modal-body">
                                      
                                        <form action="<?php echo $ImageController ?>" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="add">
                                         <input type="hidden" name="Photo" value="">
                                          <div class="form-group">
                                            <label for="lname" style="color: red"><b>SELECT IMAGE TO UPLOAD:</b></label>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                    
                                          </div>
                    
                                          <div class="form-group">
                                            <label for="uname"><b>IMAGE DESCRIPTION:</b></label>
                                            <input type="text" class="form-control" name="Description" id="description">
                                          </div>
                                      
                                          <div class="form-group">
                                            <input type="hidden" class="form-control" name="PropertyId" id="properId" value="<?= $property->getPropertyId() ?>">
                                          </div> 
                                          
                                          
                                          <button type="submit" class="btn btn-success btn-block" name="addImage">Submit</button>
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
                 <div class="modal fade" id="editModal<?= $_GET['PropertyId'] ?>" role="dialog" style="margin-top: 100px;">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                   <div class="modal-header" style="background-color: #4c2b00">
                                     <h4 class="modal-title" style="margin-left: 150px;color: white;">EDIT PROPERTY DETAILS</h4>
                                     <button type="button" class="close" data-dismiss="modal" style="background-color: white;">&times;</button>
                                     
                                   </div>
                                   <div class="modal-body">
                                       <form action="<?php echo $PropertyController ?>" method="POST">
                                       <input type="hidden" name="action" value="edit">
                                       <input type="hidden" name="PropertyId" value="<?= $property->getPropertyId() ?>">
                                       <div class="form-group">
                                           <label for="uname"><b>FEATURES:</b></label>
                                           <input type="text" class="form-control" name="Features" id="features" value="<?= $property->getFeatures() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="pass"><b>PARKING SPACE:</b></label>
                                           <input type="text" class="form-control" name="ParkingSpace" id="parkingSpace" value="<?= $property->getParkingSpace() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="fname"><b>HOUSE PRICE:</b></label>
                                           <input type="text" class="form-control" name="HousePrice" id="housePrice" value="<?= $property->getHousePrice() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="lname"><b>PROPERTY TYPE:</b></label>
                                           <input type="text" class="form-control" id="propertyType" name="PropertyType" value="<?= $property->getPropertyType() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="lname"><b>PUBLIC REMARKS:</b></label>
                                           <input type="text" class="form-control" id="publicRemarks" name="PublicRemarks" value="<?= $property->getPublicRemarks() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="age"><b>BATHROOM:</b></label>
                                           <input type="text" class="form-control" id="bathroom"  name="Bathroom" value="<?= $property->getBathroom() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="phone"><b>BEDROOM:</b></label>
                                           <input type="text" class="form-control" id="bedroom" name="Bedroom" value="<?= $property->getBedroom() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="address"><b>HALL:</b></label>
                                           <input type="text" class="form-control" id="hall" name="Hall" minlength="0" value="<?= $property->getHall() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="address"><b>BALCONY:</b></label>
                                           <input type="text" class="form-control" id="balcony" name="Balcony" value="<?= $property->getBalcony() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="uname"><b>SIZE INTERIOR:</b></label>
                                           <input type="text" class="form-control" name="SizeInterior" id="sizeInterior" value="<?= $property->getSizeInterior() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="pass"><b>SIZE EXTERIOR:</b></label>
                                           <input type="text" class="form-control" name="SizeExterior" id="sizeExterior" value="<?= $property->getSizeExterior() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="fname"><b>UTILITIES:</b></label>
                                           <input type="text" class="form-control" name="Utilities" id="utilities" value="<?= $property->getUtilities() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="lname"><b>PET FRIENDLY:</b></label>
                                           <input type="text" class="form-control" id="petFriendly" name="PetFriendly" value="<?= $property->getPetFriendly() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="lname"><b>STREET ADDRESS:</b></label>
                                           <input type="text" class="form-control" id="streetAddress" name="StreetAddress" value="<?= $property->getStreetAddress() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="age"><b>CITY:</b></label>
                                           <input type="text" class="form-control" id="city"  name="City" value="<?= $property->getCity() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="phone"><b>PROVINCE:</b></label>
                                           <input type="text" class="form-control" id="province" name="Province" value="<?= $property->getProvince() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="address"><b>POSTAL CODE:</b></label>
                                           <input type="text" class="form-control" id="postalcode" name="Postalcode" value="<?= $property->getPostalcode() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="address"><b>COUNTRY:</b></label>
                                           <input type="text" class="form-control" id="country" name="Country" value="<?= $property->getCountry() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="lname"><b>NEIGHBORHOOD:</b></label>
                                           <input type="text" class="form-control" id="neighborhood" name="Neighborhood" value="<?= $property->getNeighborhood() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="age"><b>CONSTRUCTED DATE:</b></label>
                                           <input type="date" class="form-control" id="constructedDate"  name="ConstructedDate" value="<?= $property->getConstructedDate() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="phone"><b>RENOVATED DATE:</b></label>
                                           <input type="date" class="form-control" id="renovatedDate" name="RenovatedDate" value="<?= $property->getRenovatedDate() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="address"><b>OWNER NAME:</b></label>
                                           <input type="text" class="form-control" id="ownerName" name="OwnerName" value="<?= $property->getOwnerName() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="address"><b>OWNER CONTACT NUMBER:</b></label>
                                           <input type="text" class="form-control" id="ownerConNo" name="OwnerConNo" value="<?= $property->getOwnerConNo() ?>">
                                         </div>
                                         <div class="form-group">
                                           <label for="uname"><b>AGREEMENT TYPE:</b></label>
                                           <input type="text" class="form-control" name="AgreementType" id="agreementType" value="<?= $property->getAgreementType() ?>">
                                         </div>
                                         <div class="form-group">
                                           <input type="hidden" class="form-control" name="UserId" id="userId" value="<?= $property->getUserId() ?>">
                                         </div> 
                             
                                       
                                       <button type="submit" class="btn-sm" name="editProperty" style="padding: 14px 40px;color: white;background-color:#4c2b00;">SUBMIT</button>
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