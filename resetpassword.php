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
                        <h3 class="breadcumb-title">My Account</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

      <?php if(isset($_GET['token'])):
             $_SESSION['Token'] = $_GET['token'];
           endif; ?> 

    <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-<?php echo $_SESSION['msgType'] ?>">
                    <strong><?php echo $_SESSION['msgType'] ?>!</strong> <?= $_SESSION['msg']; ?>
                </div>
            <?php endif; ?>
    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">

                    <div>
                         <h2>Update Your Password</h2>
                    </div>

                    <div class="single-blog-area">
                       <form action="<?php echo $coreController ?>" method="POST">
                            <input type="hidden" name="action" value="resetpass">
                              <div class="form-group">
                                <label for="pass"><b><i class="material-icons" style="color: #947054;font-size:30px">vpn_key</i></b></label>
                                <input type="password" class="form-control" name="Password" id="pass" placeholder="Enter Your New Password">
                              </div>
                             <button type="submit" class="btn btn-success" style="padding: 14px 40px;">SUBMIT</button>
                    
                        </form>
                   </div>
                    
                </div>

                <div class="col-12 col-lg-6">
                    <div class="blog-sidebar-area">           
                      <iframe class="video" src="teacher1.ogg" style="height: 400px;width: 600PX;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   
        <!-- Main Footer Area -->
        <?php include "footer.php" ; ?>

        


   

</body>

</html>