

<?php


    require("../infoBDD.php");

    $bdd = new PDO("mysql:host=$host,dbname=$db", $user, $pwd);


    $q = $bdd ->prepare("SELECT username, firstname, Avatar, description, img_fond, facebook, youtube, twitter FROM user WHERE username=:user");
    $q->bindParam(":user", $id);
    $q->execute();
    $r = $q ->fetchAll();


    $usernamePhp = $r[0]['username'];
    $firstnamePhp = $r[0]['firstname'];
    $AvatarPhp = $r[0]['Avatar'];
    $descriptionPhp = $r[0]['description'];
    $img_fondPhp = $r[0]['img_fond'];

    //Lien vers d'autre page web
    if($r[0]['facebook'] != NULL){
        $facebookPhp = $r[0]['facebook'];
    }
    if($r[0]['twitter'] != NULL){
        $twitterPhp = $r[0]['twitter'];
    }
    if($r[0]['youtube'] != NULL){
        $youtubePhp = $r[0]['youtube'];
    }


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MeetBand</title>
    <link rel="icon" type="image/png" href="img/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="css/BootStrapPageProfil.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic" rel="stylesheet"> <!--typographie Nom-->


</head>






<body>
<!-- Navigation Entête -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <img id="logo" src="img/logo.png" alt="error"/>
        <img id="logoMeetBand" src="img/MeetBand2.png" alt="error"/>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Accueil.html">Accueil</a>               <!-- page de Sarah -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Message.html">Message</a>               <!-- Messagerie de Florent -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Menu.html">Menu</a>                     <!-- Menu déroulant pour choisir entre déconnecter/infoProfil/... -->
            </ul>
            </li>
        </div>
    </div>
</nav>



<header class="masthead" style="background-image: linear-gradient(to top, rgba(0,0,0,1) 0%,  rgba(0,0,0,1) 15%, rgba(0,0,0,0) 50%,  rgba(0,0,0,0) 65%, rgba(10,10,10,1) 95%), url('img/Basse.jpg');">    <!-- Importer des image de fond d'écran -->
    <div class="overlay"></div><br><br><br><br><br><br><br><br><br><br><br><br>
    <table id="tableauInstru">
        <tr>
            <td>
                <img class="instrumentJoué" src="" alt="error">
            </td>
        </tr>
    </table><br><br>
</header>

<!-- Personne -->
<div class="container">
    <div id="cercle"></div>
    <div class="Arrondi">
        <img id="AvatarImage" src="img/Avatar.jpg" alt="error"/>
    </div>
</div>

<div class="site-heading">
    <h1 id="Nom">
        <?php echo $usernamePhp ?>                    <!-- Nom de la personne-->
    </h1>
</div>




<!-- description -->
<table class="tableauCouleur">
    <tr>
        <td>
            <div class="containerTable">
                <p id="description" href="description_profil/<?php $descriptionPhp ?> ">
                </p>
            </div>
        </td>
        <td>

            <!-- Lien vers d'autres sites -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <ul class="list-inline text-center">
                                <li class="list-inline-item"> <!-- Twitter -->
                                    <a href="lien/<?php $ytwitterPhp ?>">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item"> <!-- Facebook -->
                                    <a href="lien/<?php $facebookPhp ?>">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item"> <!-- youtube -->
                                    <a href="lien/<?php $youtubePhp ?>">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </td>
    </tr>
</table><br><br><br>


<!-- Annonce -->
<table class="tableauCouleur">
    <tr>
        <th>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">
                            <a href="post.html">
                                <h2 class="post-title">
                                    Man must explore, and this is exploration at its greatest
                                </h2>
                                <h3 class="post-subtitle">
                                    Problems look mighty small from 150 miles up
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">Start Bootstrap</a>
                                on July 8, 2018</p>
                        </div>
                        <hr>
                        <!-- Pager -->
                        <div class="clearfix">
                            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </th>
    </tr>
</table>

<hr>





<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
