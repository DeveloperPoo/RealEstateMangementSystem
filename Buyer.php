<?php
include "../header.php";
$db = new BuyerDBManager(); 
 


switch ($_REQUEST['action']){
	case "add":
		if(!empty($_POST['BuyerEmail']) && !empty($_POST['BuyerPrice'])) 
		{
			
					
					$db->addBuyer( new Buyer( $_POST ));
					//header("location: ../contact.php");
					$_SESSION['msgType'] = "success";
					$_SESSION['msg'] = " Your BUYING REQUEST sent successfully";
				
					
	
			
		}else{
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}

break;
case "accept":
		if(isset($_GET['BuyerId']) && isset($_GET['BuyerEmail'])&& isset($_GET['PropertyId'])){
			//var_dump($_GET['VisiterEmail']);
			
			$to = $_GET['BuyerEmail'];
			$headers = 'From: poojathakkar1997@gmail.com'."\r\n".
							   'MIME-Version: 1.0' . "\r\n" .
							   'Content-Type: text/html; charset=urf-8';
			$subject = "Regarding Requested Visit";
			$message = "
							<html>
							<head>
							<title>HTML email</title>
							</head>
							<body>
							<p>YOUR REQUEST FOR BUYING THE PROPERTY IS ACCEPTED BY SELLER.</p>
							</body>
							</html>
						";
			$result = mail($_GET['BuyerEmail'],$subject,$message,$headers);
			if($result){
						echo '<script>alert("EMAIL SENT REGARDING ACCEPTANCE OF REQUESTED VISIT")</script>';
						$db->MarkasaAccepted($_GET['BuyerId'],$_GET['PropertyId']);
						
						
					}
			$_SESSION['msgType'] = "success";
			$_SESSION['msg'] = " Visit accepted successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "decline":
		if(isset($_GET['BuyerId']) && isset($_GET['BuyerEmail']) && isset($_GET['PropertyId'])){
			$db->MarkasDecline($_GET['BuyerId'],$_GET['PropertyId']);
			$to = $_GET['BuyerEmail'];
			$headers = 'From: poojathakkar1997@gmail.com'."\r\n".
							   'MIME-Version: 1.0' . "\r\n" .
							   'Content-Type: text/html; charset=urf-8';
			$subject = "Regarding Requested Visit";
			$message = "
							<html>
							<head>
							<title>HTML email</title>
							</head>
							<body>
							<p>YOUR REQUEST FOR VISITNG THE PROPERTY IS DECLIEND BY SELLER.</p>
							</body>
							</html>
						";
			$result1 = mail($_GET['BuyerEmail'],$subject,$message,$headers);
			if($result1){
						echo '<script>alert("EMAIL SENT REGARDING DECLIEND OF REQUESTED VISIT")</script>';
						
						
					}
			$_SESSION['msgType'] = "success";
			$_SESSION['msg'] = " Visit declined successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	
	default:
		$_SESSION['msg'] = "Sorry, no action specified";
}
	


//go back to previous page
header("location: " . $_SERVER['HTTP_REFERER']);
?>