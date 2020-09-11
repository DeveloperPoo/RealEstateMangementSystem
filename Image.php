<?php
include "../header.php";
$db = new ImagesDBManager(); 
$_SESSION['msgType'] = "success";



	



switch ($_REQUEST['action']){
	case "add":
		//validate entry
		//var_dump($_POST);
		if(!empty($_POST['Description']) && !empty($_POST['PropertyId'])) 
		{
				$_POST['Photo']= $_FILES["fileToUpload"]["name"];
				//var_dump($_POST);
				$target_dir = "../img/pro-img/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image
				if(isset($_POST["addImage"])) {
				  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				  if($check !== false) {
				    
				    $_SESSION['msg'] = "File is an image - " . $check["mime"] . ".";
					$_SESSION['msgType'] = "success";
				    $uploadOk = 1;
				  } else {
				    
				    $_SESSION['msg'] = "File is not an image.";
					$_SESSION['msgType'] = "danger";
				    $uploadOk = 0;
				  }
				}

				// Check if file already exists
				if (file_exists($target_file)) {
				 
				  $_SESSION['msg'] = "Sorry, file already exists.";
					$_SESSION['msgType'] = "danger";
				  $uploadOk = 0;
				}

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
				  
				  $_SESSION['msg'] = "Sorry, your file is too large.";
					$_SESSION['msgType'] = "danger";
				  $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  
				$_SESSION['msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$_SESSION['msgType'] = "danger";
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				  
				  $_SESSION['msg'] = "Sorry, your file was not uploaded.";
					$_SESSION['msgType'] = "danger";
				// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				   // echo "The file ". basename( $_FILES["Photo"]["name"]). " has been uploaded.";
				  	$db->addImage(new Images( $_POST));
					$_SESSION['getChoosePropertyID'] = "";
					
					$_SESSION['msg'] = "Image Successfully added";
					$_SESSION['msgType'] = "success";
				   
				  } else {
				  	$_SESSION['msg'] = "Sorry, there was an error uploading your file.";
					$_SESSION['msgType'] = "danger";
				    
				  }
				}

			
			
			
		}else{
			 //header("location: ../UserProperty.php");
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}

		break;
	
	case "edit":
		//validate entry
	//var_dump($_POST);
		if(isset($_POST['ImageId'])) {

			$_POST['Photo']= $_FILES["fileToUpload"]["name"];
				//var_dump($_POST);
				$target_dir = "../../img/pro-img/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image
				if(isset($_POST["editImage"])) {
				  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				  if($check !== false) {
				    
				    $_SESSION['msg'] = "File is an image - " . $check["mime"] . ".";
					$_SESSION['msgType'] = "success";
				    $uploadOk = 1;
				  } else {
				    
				    $_SESSION['msg'] = "File is not an image.";
					$_SESSION['msgType'] = "danger";
				    $uploadOk = 0;
				  }
				}

				// Check if file already exists
				if (file_exists($target_file)) {
				 
				  $_SESSION['msg'] = "Sorry, file already exists.";
					$_SESSION['msgType'] = "danger";
				  $uploadOk = 0;
				}

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
				  
				  $_SESSION['msg'] = "Sorry, your file is too large.";
					$_SESSION['msgType'] = "danger";
				  $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  
				$_SESSION['msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$_SESSION['msgType'] = "danger";
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				  
				  $_SESSION['msg'] = "Sorry, your file was not uploaded.";
					$_SESSION['msgType'] = "danger";
				// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				   // echo "The file ". basename( $_FILES["Photo"]["name"]). " has been uploaded.";
				  	
					$_SESSION['getChoosePropertyID'] = "";
					
					$db->editImage( new Images( $_POST ));
		
					$_SESSION['msg'] = "Image ID " . $_POST['ImageId'] . " " .  " was edited successfully!";
				   
				  } else {
				  	$_SESSION['msg'] = "Sorry, there was an error uploading your file.";
					$_SESSION['msgType'] = "danger";
				    
				  }
				}

			
			
			
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	case "delete":
		if(isset($_GET['ImageId'])){
			$db->deleteImage($_GET['ImageId']);
			$_SESSION['msg'] = "Image ID " . $_GET['ImageId'] . " was deleted successfully!";
		}else
			$_SESSION['msg'] = "Sorry, no user specified";

		break;
	
	default:
		$_SESSION['msg'] = "Sorry, no action specified";
}

//go back to previous page
header("location: " . $_SERVER['HTTP_REFERER']);
?>