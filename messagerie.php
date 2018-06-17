<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 17/06/2018
 * Time: 16:35
 */

session_start();
if ((!isset($_SESSION)) && $_SESSION["user"]==""){
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf8">
    <title>Messagerie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="card-header"></div>
    <div class="container-fluid">
        <div class="row">
            <nav id="contact" class="flex-column nav-pills nav-justified col-2"  style="background-color: #b3d7ff;">
                <div class="nav-item"><a class="nav-link active" href="#">Exemple 1</a></div>
                <div class="nav-item"><a class="nav-link" href="#">Exemple 2</a></div>
            </nav>
            <div class="container-fluid col-10">
                <div id="conv" class="row">
                    Test
                </div>
                <div class="row">
                    <textarea class="form-control" placeholder="Votre message..."></textarea>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="oXHR.js"></script>
    <script type="text/javascript" src="messagerie.js"></script>
</body>
</html>