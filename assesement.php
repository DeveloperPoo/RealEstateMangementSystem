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
                        <h3 class="breadcumb-title">ASSESEMENT</h3>
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
                       
                        <!-- ##### Advance Search Area Start ##### -->
                            <div class="south-search-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="advanced-search-form">
                                                <!-- Search Title -->
                                                <div class="search-title">
                                                    <p>Estimate Your House</p>
                                                </div>
                                                <!-- Search Form -->
                                                <form action="#" method="post" id="advanceSearch">
                                                    <div class="row">

                                                        <div class="col-sm-9 col-md-6 col-lg-8 col-xl-12">
                                                            <div class="form-group">
                                                                <p style="color: black">Property Address :</p>
                                                                <input type="input" class="form-control" name="address" placeholder="Enter Your Location" >
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <select class="form-control" name="catagories">
                                                                    <option>All Catagories</option>
                                                                    <option value="Apartment">Apartment</option>
                                                                    <option value="Condo">Condo</option>
                                                                    <option value="House">House</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4 col-xl-3">
                                                            <div class="form-group">
                                                                <select class="form-control" name="listings">
                                                                    <option>Unit #</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4 col-xl-3">
                                                            <div class="form-group">
                                                                <select class="form-control" name="year">
                                                                    <option>Year</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5+</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4 col-xl-3" >
                                                           <p style="color: black">Acquire Asset Price :</p>
                                                        </div>

                                                        <div class="col-12 col-md-8 col-lg-12 col-xl-3 d-flex">
                                                             
                                                            <!-- Space Range
                                                            <div class="slider-range">
                                                                <div data-min="500" data-max="5000" data-unit=" $ " class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="500" data-value-max="5000">
                                                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                                    
                                                                </div>
                                                                <div class="range">500 $ - 5000 $</div>
                                                            </div> -->
                                                            <input type="text" class="form-control" id="propertyprice" name="propertyprice" placeholder="Enter Your Purchase Value" style="width: 500px;">
                                                            <p style="margin-left: 10px;"> $ </p>
                                                            
                                                        </div>

                                                        
                                                        <div class="col-12 d-flex justify-content-between align-items-end">
                                                             
                                                            
                                                            <!-- Submit -->
                                                            <div class="form-group mb-0">
                                                                <button type="submit" id="second" class="btn south-btn" name="ESTIMATE" style="margin-left: 430px;background-color: #4c2b00;color: white;">Search</button>
                                                            </div>


                                        
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between align-items-end">

                                                            <?php if(isset($_POST['ESTIMATE'])):?>
                                                                
                                                                <?php  if($_POST['year'] != "Year" && $_POST['listings'] != "Unit #" && $_POST['catagories'] != "All Catagories" && $_POST['propertyprice'] != " "):
                                                                     
                                                                    
                                                                     $Future_Growth = (1 + 0.034)^$_POST['year'];
                                                                     $Future_Value= ($Future_Growth) * ($_POST['propertyprice']);
                                                                       ?>
                                                                        <div id="ADD_BUTTON_DIV">
                                                                            <p style="color: black;">YOUR PROPERTY LOCATION IS : <?php echo $_POST['address'];?></p>
                                                                            <p style="color: black;">YOUR PROPERTY HAS : <?php echo $_POST['listings'];?> UNITS</p>
                                                                            <p style="color: black;">YOUR PROPERTY TYPE IS : <?php echo $_POST['catagories'];?></p>
                                                                            <p style="color: black;">YOUR ESTIMATE VALUE IS : <?php echo $Future_Value;?></p>
                                                                        </div>
                                                                    <?php else: ?>
                                                                    <?php  if($_POST['year'] == "Year"):
                                                                      echo '<script>alert("Sorry, validation failed !! PLEASE SELECT VALID YEAR OPTION")</script>';
                                                                    ?>
                                                                    <?php endif;  ?>
                                                                    <?php  if($_POST['propertyprice'] == " "):
                                                                      echo '<script>alert("Sorry, validation failed !! PLEASE ENTER VALID PROPERTY PRICE")</script>';
                                                                    ?>
                                                                    <?php endif;  ?>
                                                                    <?php  if( $_POST['listings'] == "Unit #"):
                                                                      echo '<script>alert("Sorry, validation failed !! PLEASE SELECT VALID UNIT NUMBER OPTION")</script>';
                                                                     ?>
                                                                    <?php endif;  ?>
                                                                    <?php  if($_POST['catagories'] == "All Catagories"):
                                                                       echo '<script>alert("Sorry, validation failed !! PLEASE SELECT VALID CATAGORIES OPTION")</script>';
                                                                    ?>
                                                                    <?php endif;  ?> 
                                                                <?php endif;  ?>     
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ##### Advance Search Area End ##### -->
                   </div>  
                </div>

                
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
   <!--  <script>
              $(document).ready(function(){
                    
                      $("div#ADD_BUTTON_DIV").hide();
                    });
   
              $(document).ready(function(){
                $("button#second").click(function(){
                  $("#ADD_BUTTON_DIV ").show();
                });
              });
   
               
              
              
      </script> -->

        <?php include "footer.php" ; ?>

 
</body>

</html>