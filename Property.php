<?php
include "../header.php";
$db = new PropertyDBManager(); 
$_SESSION['msg'] = "success";


	



switch ($_REQUEST['action']){
	case "add":
		//validate entry
			//var_dump($_POST);
		if(!empty($_POST['Features']) && !empty($_POST['ParkingSpace']) && !empty($_POST['HousePrice']) && !empty($_POST['PropertyType'])&& !empty($_POST['PublicRemarks']) && !empty($_POST['Bathroom']) && !empty($_POST['Bedroom']) && !empty($_POST['Hall'])&& !empty($_POST['Balcony']) && !empty($_POST['SizeInterior']) && !empty($_POST['SizeExterior'])&& !empty($_POST['Utilities']) && !empty($_POST['PetFriendly']) && !empty($_POST['StreetAddress']) && !empty($_POST['City'])&& !empty($_POST['Province']) && !empty($_POST['Postalcode'])&& !empty($_POST['Country'])&& !empty($_POST['Neighborhood']) && !empty($_POST['ConstructedDate']) && !empty($_POST['RenovatedDate']) && !empty($_POST['OwnerName'])&& !empty($_POST['OwnerConNo']) && !empty($_POST['AgreementType'])) 
		{
				/*var_dump($_POST);*/
			 $db->addProperty(new Property( $_POST));
			// $db->updateUserid(implode($_SESSION['id']),);
			//header("location: ./PropertyList.php");
			 $_SESSION['msg'] = "Property Successfully added";
				$_SESSION['msgType'] = "success";
			
			
		}else{
			 //header("location: ../UserProperty.php");
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}

		break;
	case "edit":
		//validate entry
	//var_dump($_POST);
		if(isset($_POST['PropertyId'])) {
			$db->editProperty( new Property( $_POST ));
			//header("location: ../UserSingleProperty.php");
			$_SESSION['msg'] = $_POST['PropertyId'] . " " .  " was edited successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "delete":
		if(isset($_GET['PropertyId'])){
			$db->deleteProperty($_GET['PropertyId']);
			header("location: ../PropertyList.php");
			$_SESSION['msg'] = "User ID " . $_GET['PropertyId'] . " was mark as sold successfully!";
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