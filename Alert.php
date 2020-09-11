<?php
include "../header.php";
$db = new AlertDBManager(); 
$_SESSION['msg'] = "success";


	



switch ($_REQUEST['action']){
	case "add":
		//validate entry
			//var_dump($_POST);
		if(!empty($_POST['PropertyId']) && !empty($_POST['UserId'])) 
		{
				// var_dump($_POST);
			 $db->addAlert(new Alert( $_POST));
			 	$_SESSION['msg'] = "Choosen Property successfully added to your wishlist.";
				$_SESSION['msgType'] = "success";
				/*$_SESSION['wishlist'] = "1";*/

			
			
		}else{
			 //header("location: ../UserProperty.php");
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}

		break;
	case "ban":
		if(isset($_GET['Alertid'])){
			$db->deleteAlert($_GET['Alertid']);
			$_SESSION['msg'] = " Removed from your wishlist successfully!";
			$_SESSION['msgType'] = "success";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	
	
	default:
		$_SESSION['msg'] = "Sorry, no action specified";
}

//go back to previous page
header("location: " . $_SERVER['HTTP_REFERER']);
?>