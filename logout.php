
<?php
include('config.php');
$accesstoken=$_SESSION['access_token'];
 
//Reset OAuth access token
$google_client->revokeToken($accesstoken);
 
//Destroy entire session data.
session_destroy();
 
//redirect page to page_connexion.php
header('location:page_connexion.php');
?>