<?php
require("requete.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
$pdo=connexion();

$etat=$_POST['etat'];
$iddemande=$_SESSION['iddemande'];
$idpriorite=$_POST['priori'];
update_demande_res($pdo,$idpriorite,$etat,$iddemande);
if (isset($_SESSION['fonction'])){
    if ($_SESSION['fonction']=='responsable'){
        ?>
        <!DOCTYPE html>
    <html>
        <head>
            <title>formulaire</title>
            <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
    <body>
    <div class="container">
            <div class="row">
                <article class="col-md-5">
                    <nav class = "navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header"> 
                                <h5 class="d-inline p-2 text-bg-dark">maison des ligue</h5>
                                <h5 class="d-inline p-2 text-bg-dark" style="margin-top: 15px">page d'accueil</h5>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'page_responsable.php'">retour </button>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconnexion </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
            <div class="row" style="margin-top: 15px">
            la demande a bien était modifier 
            </div>
    </div>
    </body>
</html>
<?php }}else{echo('session inexistante');}?>