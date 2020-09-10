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
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: #4c2b00;color: white;padding: 14px 40px;margin-left: 450px;">ADD PROPERTY</button>
 
                              <div class="modal fade" id="myModal" role="dialog"style="margin-top: 100px;">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color: #4c2b00">
                                      <h4 class="modal-title" style="margin-left: 150px;color: white;">ADD PROPERTY</h4>
                                      <button type="button" class="close" data-dismiss="modal" style="background-color: white;">&times;</button>
                                      
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo $PropertyController ?>" method="POST">
                                        <input type="hidden" name="action" value="add">
                                        <div class="form-group">
                                            <label for="uname"><b>FEATURES:</b></label>
                                            <input type="text" class="form-control" name="Features" id="features">
                                          </div>
                                          <div class="form-group">
                                            <label for="pass"><b>PARKING SPACE:</b></label>
                                            <input type="text" class="form-control" name="ParkingSpace" id="parkingSpace">
                                          </div>
                                          <div class="form-group">
                                            <label for="fname"><b>HOUSE PRICE:</b></label>
                                            <input type="text" class="form-control" name="HousePrice" id="housePrice">
                                          </div>
                                          <div class="form-group">
                                            <label for="lname"><b>PROPERTY TYPE:</b></label>
                                            <input type="text" class="form-control" id="propertyType" name="PropertyType">
                                          </div>
                                          <div class="form-group">
                                            <label for="lname"><b>PUBLIC REMARKS:</b></label>
                                            <input type="text" class="form-control" id="publicRemarks" name="PublicRemarks">
                                          </div>
                                          <div class="form-group">
                                            <label for="age"><b>BATHROOM:</b></label>
                                            <input type="text" class="form-control" id="bathroom"  name="Bathroom">
                                          </div>
                                          <div class="form-group">
                                            <label for="phone"><b>BEDROOM:</b></label>
                                            <input type="text" class="form-control" id="bedroom" name="Bedroom">
                                          </div>
                                          <div class="form-group">
                                            <label for="address"><b>HALL:</b></label>
                                            <input type="text" class="form-control" id="hall" name="Hall" minlength="0">
                                          </div>
                                          <div class="form-group">
                                            <label for="address"><b>BALCONY:</b></label>
                                            <input type="text" class="form-control" id="balcony" name="Balcony">
                                          </div>
                                          <div class="form-group">
                                            <label for="uname"><b>SIZE INTERIOR:</b></label>
                                            <input type="text" class="form-control" name="SizeInterior" id="sizeInterior">
                                          </div>
                                          <div class="form-group">
                                            <label for="pass"><b>SIZE EXTERIOR:</b></label>
                                            <input type="text" class="form-control" name="SizeExterior" id="sizeExterior">
                                          </div>
                                          <div class="form-group">
                                            <label for="fname"><b>UTILITIES:</b></label>
                                            <input type="text" class="form-control" name="Utilities" id="utilities">
                                          </div>
                                          <div class="form-group">
                                            <label for="lname"><b>PET FRIENDLY:</b></label>
                                            <input type="text" class="form-control" id="petFriendly" name="PetFriendly">
                                          </div>
                                          <div class="form-group">
                                            <label for="lname"><b>STREET ADDRESS:</b></label>
                                            <input type="text" class="form-control" id="streetAddress" name="StreetAddress">
                                          </div>
                                          <div class="form-group">
                                            <label for="age"><b>CITY:</b></label>
                                            <input type="text" class="form-control" id="city"  name="City">
                                          </div>
                                          <div class="form-group">
                                            <label for="phone"><b>PROVINCE:</b></label>
                                            <input type="text" class="form-control" id="province" name="Province">
                                          </div>
                                          <div class="form-group">
                                            <label for="address"><b>POSTAL CODE:</b></label>
                                            <input type="text" class="form-control" id="postalcode" name="Postalcode">
                                          </div>
                                          <div class="form-group">
                                            <label for="address"><b>COUNTRY:</b></label>
                                            <input type="text" class="form-control" id="country" name="Country">
                                          </div>
                                          <div class="form-group">
                                            <label for="lname"><b>NEIGHBORHOOD:</b></label>
                                            <input type="text" class="form-control" id="neighborhood" name="Neighborhood">
                                          </div>
                                          <div class="form-group">
                                            <label for="age"><b>CONSTRUCTED DATE:</b></label>
                                            <input type="date" class="form-control" id="constructedDate"  name="ConstructedDate">
                                          </div>
                                          <div class="form-group">
                                            <label for="phone"><b>RENOVATED DATE:</b></label>
                                            <input type="date" class="form-control" id="renovatedDate" name="RenovatedDate">
                                          </div>
                                          <div class="form-group">
                                            <label for="address"><b>OWNER NAME:</b></label>
                                            <input type="text" class="form-control" id="ownerName" name="OwnerName">
                                          </div>
                                          <div class="form-group">
                                            <label for="address"><b>OWNER CONTACT NUMBER:</b></label>
                                            <input type="text" class="form-control" id="ownerConNo" name="OwnerConNo">
                                          </div>
                                          <div class="form-group">
                                            <label for="uname"><b>AGREEMENT TYPE:</b></label>
                                            <input type="text" class="form-control" name="AgreementType" id="agreementType">
                                          </div>
                                          <div class="form-group">
                                            <input type="hidden" class="form-control" name="UserId" id="userId" value="<?php echo implode($_SESSION['id']);?>">
                                          </div> 
                                          
                                          
                                          <button type="submit" class="btn btn-success btn-block" name="addProperty">Submit</button>
                                        </form> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>

                            </div>
            </div>
            

            <div class="row" style="margin-top: 50px;">

                <!-- Single Featured Property -->
                <!-- <?php var_dump($_SESSION['id']);?> -->
                <?php foreach ($property_db->getAllPropertyByUSer(implode($_SESSION['id'])) as $property) :?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="img/bg-img/feature1.jpg" alt="">

                            <div class="tag">
                                <span><a href="UserSingleProperty.php?PropertyId=<?= $property->getPropertyId()?>" style="color: white;">EXPAND</a></span>
                            </div>
                            <div class="list-price">
                                <p><?= $property->getHousePrice() ?></p>
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
                              
                               <button type="button"class ="btn btn-sm" style="background-color: #4c2b00;"><a href="UserSingleProperty.php?PropertyId=<?= $property->getPropertyId()?>"  style="color: white;">EDIT</a></button> 

                               <button type="button"class ="btn btn-sm " style="margin-left: 155px;background-color: #4c2b00;color: white;"><a href="<?php echo $PropertyController ?>?action=delete&PropertyId=<?= $property->getPropertyId() ?>" onclick="return confirm('Are you sure you want to DELETE <?= $property->getPropertyId() ?>')" style="color: white;">DELETE</a></button>
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