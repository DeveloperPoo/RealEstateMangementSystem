<?php
include "../header.php";
$db = new FeedbackDBManager(); 

		if(!empty($_POST['FeedbackerName']) && !empty($_POST['FeedbackerNumber'])&& !empty($_POST['FeedbackerEmail']) && !empty($_POST['FeedbackerMessage'])) 
		{
			
					
					$db->addFeedback( new Feedback( $_POST ));
					header("location: ../contact.php");
					$_SESSION['msgType'] = "success";
					$_SESSION['msg'] = $_POST['Firstname'] . " " . $_POST['Lastname'] . " message sent successfully";
				
					
	
			
		}else{
			$_SESSION['msg'] = "Sorry, validation failed !! PLEASE FILL ALL THE DETAILS";
			$_SESSION['msgType'] = "danger";
		}


	


//go back to previous page
//header("location: " . $_SERVER['HTTP_REFERER']);
?>