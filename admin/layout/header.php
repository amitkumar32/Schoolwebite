<!DOCTYPE html>
<?php 
//include 'admin/functions.php';
global $conn;
ob_start();

?>
<html>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Online School | Admin</title>
      <link href="assets/css/css.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
      <link rel="stylesheet" type="text/css" href="assets/css/morris.css">
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   </head>
   <body>
    <div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a href="javascript:void(0)" class="logo" style="font-size:30px; color:#fff; font-weight:bold">
                  <!-- <img src="assets/logo.png" alt="" width="40" height="40"> -->
                  Welcome
               </a>
            </div>
            <div class="page-title-box pull-left">
               <h3>Online School Website</h3><h4></h4>  
            </div>
          <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar">
            <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <ul class="nav navbar-nav navbar-right user-menu pull-right">
               <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                  <span class="user-img"><img class="img-circle" src="assets/img/user.jpg" alt="Admin" width="40">                            
                  </span>
                  <span>Admin</span>
                  <i class="caret"></i>
                  </a>                        
               </li>
            </ul>
         </div>