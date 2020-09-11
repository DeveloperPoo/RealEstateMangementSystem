<?php
include "../header.php";
$db = new RoomDBManager(); 
$_SESSION['msgType'] = "success";



	



switch ($_REQUEST['action']){
	case "add":
		//validate entry
		//var_dump($_POST);
		if(!empty($_POST['RoomType']) && !empty($_POST['RoomWidth']) && !empty($_POST['RoomLength']) && !empty($_POST['Dimension'])) 
		{
				//var_dump($_POST);
			 $db->addRoom(new Room( $_POST));
			
			// $db->updateUserid(implode($_SESSION['id']),);
			 /*header("location: ../RoomList.php");*/

			 $_SESSION['msg'] = "Room Successfully added";
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
		if(isset($_POST['RoomId'])) {
			$db->editRoom( new Room( $_POST ));
			//header("location: ../PropertyList.php");
			$_SESSION['msg'] = "Room ID " . $_POST['RoomId'] . " " .  " was edited successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "delete":
		if(isset($_GET['RoomId'])){
			$db->deleteRoom($_GET['RoomId']);
			$_SESSION['msg'] = "Room ID " . $_GET['RoomId'] . " was deleted successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	
	default:
		$_SESSION['msg'] = "Sorry, no action specified";
}

//go back to previous page
header("location: " . $_SERVER['HTTP_REFERER']);
?>