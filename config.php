<?php
//Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';
 
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
//Set the OAuth 2.0 Client ID
$google_client->setClientId('57198635143-h61qej40sauka9d64l5cfaa2bdqaio3o.apps.googleusercontent.com');
 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
 
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://127.0.0.1/ap2/page_connexion.php');
 
$google_client->addScope('email');
$google_client->addScope('profile');
 
//start session on web page
session_start();
if(isset($_GET["code"]))
{
    header("location: http://127.0.0.1/ap2/page_utilisateur.php");
}
?>