<?php 
include('config.php');
$accesstoken=$_SESSION['access_token'];
 
//Reset OAuth access token
$google_client->revokeToken($accesstoken);
session_destroy();
header('location: page_connexion.php');