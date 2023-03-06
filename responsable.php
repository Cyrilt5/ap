<?php     
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require ("requete.php");

$pdo=connexion();
$numdemande=[];
$objectdemande=[];
$idpriorite=[];
$etat=[];
$user=[];
$j=0;

$_SESSION['etat']=$_POST['etat'];
$_SESSION['prio']=$_POST['priorite'];
$stmt=recherche_demande($pdo,$_POST['etat'],$_POST['priorite']);
while ($row =$stmt->fetch()){
    $j++;
    $numdemande[$j] =$row['numdemande'];
    $objectdemande[$j] =$row['objectdemande'];
    $idpriorite[$j] =$row['idpriorite'];
    $etat[$j] =$row['etatavancement'];
    $user[$j] =$row['user'];
    }
if (isset($_SESSION['fonction'])){
    if ($_SESSION['fonction']=='responsable'){
        ?>
        <!DOCTYPE html>
            <html>
            <head>
                <title>formulaire</title>
                <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
            <!--    <link rel="stylesheet" href="css/style.css">-->
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
                                        <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconexion </button>
                                    </div>
                                </div>
                            </nav>
                        </article>
                    </div>
                    <form action= "responsable_modifier.php" method="post">
                        <article class="col-md-4">
                                    <h6>quel demande est a modifier ?</h6>
                                        <SELECT name="demande" id="demande" size="1">
                                        <?php for($i=1;$i<=$j;$i++){
                                                echo"
                                                <OPTION value=1>". $numdemande[$i];}
                                        ?>
                                        </SELECT>
                                </article>
                            <button class="btn btn-secondary" type ="submit">modifier la demande</button>
                            </form>
                            <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">numéro de la demande  </th>
                                    <th scope="col">objet de la demande  </th>
                                    <th scope="col">priorité de la demande</th>
                                    <th scope="col">etat </th>
                                    <th scope="col">user </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for($i=1;$i<=$j;$i++){
                                    echo"
                                    <tr>
                                        <th scope=\"row\">". $numdemande[$i]."</th>
                                        <td>".$objectdemande[$i]."</td>
                                        <td>".$idpriorite[$i]."</td>
                                        <td>".$etat[$i]."</td>
                                        <td>".$user[$i]."</td>
                                    </tr>
                                    ";}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </body>
            </html>
    <?php }}else{echo('session inexistante');}?>