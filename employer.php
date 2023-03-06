<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require ("requete.php");
$pdo=connexion();
$id_reservation=[];
$date=[];
$heure=[];
$id_salle=[];
$id_user=[];
$j=0; 

$stmt=demande_a_faire($pdo);
while ($row =$stmt->fetch()){
    $j++;
    print_r ($row);
    $id_reservation[$j] =$row['id_reservation'];
    $date[$j] =$row['date'];
    $heure[$j] =$row['heure'];
    $id_salle[$j] =$row['id_salle'];
    $id_user[$j] =$row['id_user'];
    }
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
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'page_employer.php'">retour </button>
                                <button class="d-inline p-2 text-bg-dark" onclick="window.location.href = 'deconexion.php'">deconexion </button>
                            </div>
                        </div>
                    </nav>
                </article>
            </div>
            <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">numéro de la reservation  </th>
                            <th scope="col">date de la reservation </th>
                            <th scope="col">heure de la reservation</th>
                            <th scope="col">salle reserver </th>
                            <th scope="col">l'utilisateur qui a reserver </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1;$i<=$j;$i++){
                        echo"
                        <tr>
                            <th scope=\"row\">". $id_reservation[$i]."</th>
                            <td>".$date[$i]."</td>
                            <td>".$heure[$i]."</td>
                            <td>".$id_salle[$i]."</td>
                            <td>".$id_user[$i]."</td>
                        </tr>
                        ";}?>
                    </tbody>
                </table>
        </form>
        </div>
    </div>
</body>
</html>