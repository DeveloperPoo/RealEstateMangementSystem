<?php
include "../header.php";
$db = new UserDBManager(); 
$_SESSION['msg'] = "success";


	



switch ($_REQUEST['action']){
	case "add":
		//validate entry
		//var_dump($_POST);
		if(!empty($_POST['Username']) && !empty($_POST['Password'])&& !empty($_POST['Firstname']) && !empty($_POST['Lastname'])&& !empty($_POST['Email'])&& !empty($_POST['DOB']) && !empty($_POST['Phone']) && !empty($_POST['Address'])) 
		{
			$uname  = $db->VerifyUserExistance($_POST['Username'],$_POST['Email']);
			if(!empty($uname)){
				header("location: ../enrollment.php");
				$_SESSION['msgType'] = "Danger";
				$_SESSION['msg'] = " SORRY !!! " .$_POST['Username'] . " is already EXISTS!!!";
				
				
			}else{

				if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
						header("location: ../enrollment.php");
						$_SESSION['msgType'] = "Danger";
						$_SESSION['msg'] = " SORRY !!!" . "Email address is invalid!";
				}else{
					
					$db->addUser( new User( $_POST));
					$token = bin2hex(random_bytes(50));
					unset($_SESSION['msg']);
					$headers = 'From: poojathakkar1997@gmail.com'."\r\n".
							   'MIME-Version: 1.0' . "\r\n" .
							   'Content-Type: text/html; charset=urf-8';

/*								   $result = mail($_POST['Email'], "verfiy", "hello", $headers);
	    
								    if ($result) {
								        echo "Email successfully sent to";
								    } else {
								        echo "Email sending failed...";
								        $errorMessage = error_get_last()['message'];
								        echo $errorMessage;
								    }
*/
					$message ='<!DOCTYPE html>
					<html>
					<head>
					<title>VERIFY YOUR ACCOUNT</title>
					</head>
					<body>
					<p>CLICK ON BELOW BUTTON TO LOGIN INTO YOUR ACCOUNT!</p>
					<button style="padding: 14px 40px;"><a href="http://localhost/RealEstateMangementSystem/login.php?token='. $token .'" style="color: black;">VERIFY ME</a></button>
					</body>
					</html>';
					
					$result = mail($_POST['Email'],"VERIFICATION EMAIL",$message,$headers,$token);
					/*if (!mail($_POST['Email'],"VERIFICATION EMAIL","hi",$headers,$token)) { 
							echo $result;
						    var_dump(error_get_last());
						  }*/
					$db->updateToken($_POST['Email'],$token);
					if($result){
						echo '<script>alert("Please Go to Your GMAIL to VERIFY your account")</script>';
						echo "<script>window.close();</script>";
					}
					//header("location: ../login.php");
					/*$_SESSION['msgType'] = "success";
					$_SESSION['msg'] = $_POST['Firstname'] . " " . $_POST['Lastname'] . " was added successfully!!! Verify Your Email to Login In";*/
				}
					
			}
			
		}else{
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}

		break;
	case "verify":
		//validate entry
		
		if(!empty($_POST['Username']) && !empty($_POST['Password'])) {
			if($db->VerifyEmail($_POST['Username'],$_POST['Password'])){
				$v  = $db->VerifyUser($_POST['Username'],$_POST['Password']);
				if($v){
						header("location: ../Dashboard.php");
						$_SESSION['id'] = $v;
				}else{
					//var_dump($v);
					$_SESSION['msg'] = "Sorry, Username or Password is INCORRECT";
					$_SESSION['msgType'] = "danger";
					header("location: ../login.php");
				}
			}else{
					$_SESSION['msg'] = "Sorry, Your Account is not activated....Please Check In Your ".$_POST['Email']." Account  and Click on the VERIFICATION LINK !!!!";
					$_SESSION['msgType'] = "danger";
					header("location: ../login.php");
			}
			
		}else{
			header("location: ../login.php");
			$_SESSION['msgType'] = "danger";
			$_SESSION['msg'] = "Sorry, Please Fill all the details";
			
		}

		break;
	case "edit":
		//validate entry
		//var_dump($_POST);
		if(isset($_POST['Userid'])) {
			$db->editUser( new User( $_POST ) );
			header("location: ../Dashboard.php");
			$_SESSION['msg'] = $_POST['Username'] . " was edited successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "delete":
		if(isset($_GET['Userid'])){
			$db->deleteUser($_GET['Userid']);
			$_SESSION['msg'] = "User ID " . $_GET['Userid'] . " was deleted successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "ban":
		if(isset($_GET['Userid'])){
			$db->banUser($_GET['Userid']);
			header("location: ../index.php");
			$_SESSION['msg'] = "User ID " . $_GET['Username'] . " was banned successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "ForgotPass":

		if(!empty($_POST['Email'])){
			if($t = implode($db->VerifyUserByEmail($_POST['Email']))){
				$headers = 'From: poojathakkar1997@gmail.com'."\r\n".
							   'MIME-Version: 1.0' . "\r\n" .
							   'Content-Type: text/html; charset=urf-8';

					$message ='<!DOCTYPE html>
					<html>
					<head>
					<title>FORGOT PASSWORD LINK</title>
					</head>
					<body>
					<p>CLICK ON BELOW BUTTON TO RESET PASSWORD FOR YOUR ACCOUNT!</p>
					<button style="padding: 14px 40px;"><a href="http://localhost/RealEstateMangementSystem/resetpassword.php?token='. $t .'" style="color: black;">VERIFY ME</a></button>
					</body>
					</html>';
					$result = mail($_POST['Email'],"RESET PASSWORD",$message,$headers,$t);
					if($result){
						echo '<script>alert("Please Go to Your GMAIL to RESET the password for your account")</script>';
						echo "<script>window.close();</script>";
					}
				/*$db->sendPasswordResetLink($_POST['Email'],$t);*/
			}else
				header("location: ../login.php");
				
		}else{
			header("location: ../login.php");
			$_SESSION['msgType'] = "Danger!";
			$_SESSION['msg'] = "Please, Enter Email Address ";
		}
		break;
		case "resetpass":
		if(!empty($_POST['Password'])){
			//var_dump($_SESSION['Token']);
			if(isset($_SESSION['Token'])){
			$db->ResetPasswordByToken($_POST['Password'],$_SESSION['Token']);
			header("location: ../login.php");
			$_SESSION['msgType'] = "sucess!";
			$_SESSION['msg'] = " Password Updated successfully!";
			}else{
				$_SESSION['msgType'] = "Danger!";
				$_SESSION['msg'] = "Sorry, no user specified";
			}
		}else{
			header("location: ../resetpassword.php");
			$_SESSION['msg'] = "Please, Enter New Password ";
		}
		

		break;
	default:
		$_SESSION['msg'] = "Sorry, no action specified";
}

//go back to previous page
//header("location: " . $_SERVER['HTTP_REFERER']);
?>