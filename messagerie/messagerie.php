<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 17/06/2018
 * Time: 16:35
 */

session_start();
if ((!isset($_SESSION["user"])) && $_SESSION["user"]==""){
    header("Location: ../connexion/connexion.php");
}
?>

<!DOCTYPE html>
<html lang="fr" style="height: 100%">
<head>
    <meta charset="utf8">
    <title>Messagerie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body  data-spy="scroll" data-target="#conv" data-offset="1" style="height: 100%;">
    <div class="card-header"></div>
    <div class="container-fluid" style="height: 97%;">
        <div class="row" style="height: 100%">
            <nav id="contact" class="flex-column nav-pills nav-justified col-2 border border-left-0 border-bottom-0 border-top-0 border-danger"  style="background-color: #b3d7ff;">
                <div class="nav-item"><a class="nav-link active" href="#">Exemple 1</a></div>
                <div class="nav-item"><a class="nav-link" href="#">Exemple 2</a></div>
            </nav>
            <div class="col-10 mb-2 container-fluid">
                <div id="conv" class="container-fluid">
                    Test
                </div>
                <div class="row p-1">
                    <textarea class="form-control" placeholder="Votre message..."></textarea>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../oXHR.js"></script>
    <script type="text/javascript" src="messagerie.js"></script>
</body>
</html>