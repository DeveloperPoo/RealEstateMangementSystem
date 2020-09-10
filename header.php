<?php
session_start();

//function to autoload classes
spl_autoload_register(function ($class) {
    require_once "Model/" . $class .".class.php";
});
    $coreController = "Controller/User.php";
    $FeedbackController = "Controller/Feedback.php";
    $MessageController = "Controller/Message.php";
    $PropertyController = "Controller/Property.php";
    $VisitsController = "Controller/Visits.php";
    $RoomController = "Controller/Room.php";
    $ImageController ="Controller/Image.php";
    $BuyerController ="Controller/Buyer.php";
    $AlertController = "Controller/Alert.php";

    $user_db = new UserDBManager();
    $visits_db = new VisitsDBManager();
    $property_db = new PropertyDBManager();
    $feedback_db = new FeedbackDBManager();
    $image_db = new ImagesDBManager();
    $room_db = new RoomDBManager();
    $message_db = new MessageDBManager();
    $buyer_db = new BuyerDBManager();
    $alert_db = new AlertDBManager();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Shelter Hunt Advisors</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->

 <!--  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
 <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->




</head>