<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
//Include Configuration File
include('config.php');
$login_button = '';
 
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 
 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);
 
  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];
 
  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);
 
  //Get user profile data from google
  $data = $google_service->userinfo->get();
 
  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }
 
  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }
 
  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }
 
  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }
 
  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="https://androidexample365.com/content/images/2019/11/GoogleSignUpDark.png" /></a>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>formulaire</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
    <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="css/style.css">-->
</head>
<body>
    <div class="container">
        <div class="row">
            <article class="col-md-5">
                <h5 class="d-inline p-2 text-bg-dark">maison des ligue de lorraine</h5>
                <h6 class="card-subtitle mb-2 text-muted" style="margin-top: 15px">page de connexion</h6>
            </article>
        </div>
        <div class="row" style="margin-top: 15px">
            <article class="col-md-3">
            <form action= "connexion.php" method="post">
                    <label for="user">user :</label>
                    <input id="user" type ="text" class="text-primary" name="user" required><br/>
            </article>

            <article class="col-md-3">
                    <label for="password">password :</label>
                    <input id="password" type ="password" name="password" required>
            </article>
            
        </div>
        </br>
        <div class="row">
            <article class="col-md-1">
             <button class="btn btn-danger" type ="submit">ok</button>
            </article>
        </form>
        </div>
        <article class="col-md-3">
            <div class="container">
                    <br />
                    <h2 align="center">PHP Login using Google Account</h2>
                    <br />

                <div class="panel panel-default">
                    <?php
                    if($login_button == '')
                    {
                        echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                        echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                        echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                        echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                        echo '<h3><a href="logout.php">Logout</h3></div>';
                    }
                    else
                    {
                        echo '<div align="center">'.$login_button . '</div>';
                    }
                    ?>
                </div>    
            </div>
        </article>
    </div>
</body>
</html> 

<html>
 <head>

 <body>

 </body>
</html>