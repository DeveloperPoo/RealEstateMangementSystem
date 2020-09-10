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
                        <h3 class="breadcumb-title">User Profile</h3>
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
                <div class="col-12 col-lg-8">

                    <div class="single-blog-area">
                          <?php  $user = $user_db->getSingleUser(implode($_SESSION['id'])); ?> 
                         

                      <form action="<?php echo $coreController ?>" method="POST">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="Userid" value="<?= $user->getUserid() ?>">

                            <a href="<?php echo $coreController ?>?action=ban&Userid=<?= $user->getUserid() ?>" onclick="return confirm('Are you sure you want to DELETE YOUR ACCOUNT')"class="btn" style="background-color: #4c2b00;padding: 14px 40px;color: white;margin-left: 520px;"><b>DELETE PROFILE</b></a>

                            <div class="form-group">
                                <label for="uname"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">person</i></b></label>
                                <input type="text" class="form-control" name="Username" id="uname" value="<?= $user->getUsername() ?>">
                              </div>
                              <div class="form-group">
                                <label for="pass"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">vpn_key</i></b></label>
                              <input type="text" class="form-control" id="pass" name="Password" value="<?= $user->getPassword() ?>">
                              </div>
                              <div class="form-group">
                                <label for="fname"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">person_outline</i></b></label>
                               <input type="text" class="form-control" name="Firstname" id="fname" value="<?= $user->getFirstname() ?>">
                              </div>
                              <div class="form-group">
                                <label for="lname"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">person_outline</i></b></label>
                               <input type="text" class="form-control" id="lname" name="Lastname" value="<?= $user->getLastname() ?>">
                              </div>
                              <div class="form-group">
                                <label for="lname"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">contact_mail</i></b></label>
                                <input type="text" class="form-control" name="Email" id="email" value="<?= $user->getEmail() ?>">
                              </div>
                              <div class="form-group">
                                <label for="age"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">today</i></b></label>
                                <input type="date" class="form-control" id="dob" min="18", max="100" name="DOB" value="<?= $user->getDOB() ?>">
                              </div>
                              <div class="form-group">
                                <label for="phone"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">call</i></b></label>
                                <input type="text" class="form-control" id="phone" name="Phone" value="<?= $user->getPhone() ?>">
                              </div>
                              <div class="form-group">
                                <label for="address"><b><i class="material-icons" style="color: #4c2b00;font-size:30px">home</i></b></label>
                                <input type="text" class="form-control" id="address" name="Address" value="<?= $user->getAddress() ?>">
                              </div>
                              
                             
                       
                              <button type="submit" class="btn btn-success" name="editUser" style="background-color: #4c2b00;color:white;padding: 14px 40px;margin-left: 615px;">EDIT</button>
                        </form> 
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