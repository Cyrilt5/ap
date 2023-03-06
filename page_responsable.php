<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
if (isset($_SESSION['fonction'])){
    if ($_SESSION['fonction']=='responsable'){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>formulaire</title>
            <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
            <!--<link rel="stylesheet" href="css/style.css">-->
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
                                        <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconexion </button>
                                    </div>
                                </div>
                            </nav>
                        </article>
                    </div>
                <div class="row" style="margin-top: 15px">
                    <article class="col-md-3">
                        <form action= "responsable.php" method="post">
                            <article class="col-md-4">
                                    <h6>quel priorité de demande?</h6>
                                        <SELECT name="priorite" id="prio" size="1">
                                        <OPTION>-----
                                        <OPTION >1  priorité petite </OPTION >
                                        <OPTION >2  priorité normal </OPTION >
                                        <OPTION >3  priorité grosse </OPTION >
                                        </SELECT>
                                </article>
                                <article class="col-md-4">
                                    <h6>quel et l'etat de demande?</h6>
                                        <SELECT name="etat" id="etat" size="1" >
                                        <OPTION>-----
                                        <OPTION >1  non asigné </OPTION >
                                        <OPTION >2  en cours de réalisation </OPTION >
                                        <OPTION >3  en attente</OPTION >
                                        <OPTION >4  terminé  </OPTION >
                                        </SELECT>
                                </article>
                            </article>
                        
                </div>
                </br>
                <div class="row">
                    <article class="col-md-1">
                    <button class="btn btn-danger" type ="submit">ok</button>
                    </article>
                </form>
                </div>
            </div>
        </body>
        </html>
<?php }}else{echo('session inexistante');}?>