<?php
include "../header.php";
$db = new MessageDBManager(); 

		if(!empty($_POST['MessagerName']) && !empty($_POST['MessagerNumber'])&& !empty($_POST['MessagerEmail']) && !empty($_POST['MessagerMessage'])) 
		{
			
					
					$db->addMessage( new Message( $_POST ));
					//header("location: ../SingleProperty.php");
					$_SESSION['msgType'] = "success";
					$_SESSION['msg'] = $_POST['Firstname'] . " " . $_POST['Lastname'] . " message sent successfully";
				
					
	
			
		}else{
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}


	


//go back to previous page
header("location: " . $_SERVER['HTTP_REFERER']);
?>