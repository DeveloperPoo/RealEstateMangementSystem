<?php
include "../header.php";
$db = new VisitsDBManager(); 
$_SESSION['msg'] = "success";


	



switch ($_REQUEST['action']){
	case "add":
		//validate entry
			//var_dump($_POST);
		if(!empty($_POST['VisitDate']) && !empty($_POST['VisitHour']) && !empty($_POST['VisitMinute'])) 
		{
				// var_dump($_POST);
			 $db->addVisit(new Visits( $_POST));
			 $_SESSION['msg'] = "Visit Successfully Requested";
				$_SESSION['msgType'] = "success";
			
			
		}else{
			 //header("location: ../UserProperty.php");
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}

		break;
	case "accept":
		if(isset($_GET['VisitId']) && isset($_GET['VisiterEmail'])){
			//var_dump($_GET['VisiterEmail']);
			
			$to = $_GET['VisiterEmail'];
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
							<p>YOUR REQUEST FOR VISITNG THE PROPERTY IS ACCEPTED BY SELLER.</p>
							</body>
							</html>
						";
			$result = mail($_GET['VisiterEmail'],$subject,$message,$headers);
			if($result){
						echo '<script>alert("EMAIL SENT REGARDING ACCEPTANCE OF REQUESTED VISIT")</script>';
						$db->MarkasaAccepted($_GET['VisitId']);
						
					}
			$_SESSION['msgType'] = "success";
			$_SESSION['msg'] = " Visit accepted successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "decline":
		if(isset($_GET['VisitId']) && isset($_GET['VisiterEmail'])){
			$db->MarkasDecline($_GET['VisitId']);
			$to = $_GET['VisiterEmail'];
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
			$result1 = mail($_GET['VisiterEmail'],$subject,$message,$headers);
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