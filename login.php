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
              $token = $_GET['token'];
              $user_db->UpdateVerifyStatus($token);
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
                         <h2>Logged In Yourself</h2>
                    </div>

                    <div class="single-blog-area">
                       <form action="<?php echo $coreController ?>" method="POST">
                            <input type="hidden" name="action" value="verify">
                            <div class="form-group">
                                <label for="uname"><b><i class="material-icons" style="color: #947054;font-size:30px">person</i></b></label>
                                <input type="text" class="form-control" name="Username" id="uname" placeholder="Enter Your Username">
                              </div>
                              <div class="form-group">
                                <label for="pass"><b><i class="material-icons" style="color: #947054;font-size:30px">vpn_key</i></b></label>
                                <input type="password" class="form-control" name="Password" id="pass" placeholder="Enter Your Password">
                              </div>
                             <button type="submit" class="btn btn-success" style="padding: 14px 40px;">SUBMIT</button>
                              
                            <button type="reset" class="btn" name="reset" style="padding: 14px 40px;color: white;background-color:#947054;margin-left: 177px;"><a href="enrollment.php" style="color: white;">NOT A MEMBER YET</a></button>

                            <button type="reset" class="btn" name="reset" style="padding: 14px 40px;color: white;background-color:#947054;margin-left: 150px;margin-top: 20px;"><a href="#ForgotPassword" data-toggle="collapse" style="color: white;">FORGOT YOUR PASSWORD</a></button>

                             
                        </form>
                   </div>

                   <div id="ForgotPassword" class="single-blog-area collapse" style="margin-top: 60px;">
                    <div>
                         <h2>Reset Your Password</h2>
                    </div>
                    <div>
                         <p>Please enter your email address you used to sign up on this site and we will assist you in recovering your password.</p>
                    </div>
                       <form action="<?php echo $coreController ?>" method="POST">
                            <input type="hidden" name="action" value="ForgotPass">
                            <div class="form-group">
                                <label for="uname"><b><i class="material-icons" style="color: #947054;font-size:30px">email</i></b></label>
                                <input type="email" class="form-control" name="Email" id="email" placeholder="Enter Your Emaill Address">
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