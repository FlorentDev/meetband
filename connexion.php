<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 30/05/2018
 * Time: 15:44
 */
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container-fluid jumbotron">
            <div class="row">
                <div class="col jumbotron"><img width="100%" class="mx-auto img-fluid" src="http://images.wisegeek.com/guitarist-playing-an-acoustic-guitar.jpg"></div>
                <div class="col jumbotron">
                    <!-- Connexion -->
                    <div class="container text-center jumbotron" id="connect">
                        <div class="row">
                            <div class="col-lg-12"><h1>Connexion</h1></div>
                        </div>
                        <br>
                        <form name="Connexion">
                            <div class="row">
                                <div class="col-lg-6">Nom d'utilisateur:</div>
                                <div class="col-lg-6"><input type="text" name="user"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">Mot de passe:</div>
                                <div class="col-lg-6"><input type="password" name="pass"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col"></div>
                                <input class="col btn btn-outline-primary" type="button" onclick="log()" value="Connexion">
                                <div class="col-1"></div>
                                <input class="col btn btn-outline-secondary" type="button" value="Inscription" onclick="to_register()">
                                <div class="col"></div>
                            </div>
                        </form>
                    </div>
                    <!-- Inscription -->
                    <div class="container text-center jumbotron-fluid" id="register" style="display: none">
                        <div class="row">
                            <div class="col-lg-12"><h1>Inscription</h1></div>
                        </div>
                        <br>
                        <form name="Inscription">
                            <div class="row">
                                <div class="col-lg-6">Nom d'utilisateur:</div>
                                <div class="col-lg-6"><input type="text" name="user"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">Prénom:</div>
                                <div class="col-lg-6"><input type="text" name="firstname"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">Nom:</div>
                                <div class="col-lg-6"><input type="text" name="name"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">E-mail:</div>
                                <div class="col-lg-6"><input type="email" name="email"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">Mot de passe:</div>
                                <div class="col-lg-6"><input type="password" name="pass"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">Re taper le mot de passe:</div>
                                <div class="col-lg-6"><input type="password" name="passCheck"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col"></div>
                                <input class="col btn btn-outline-primary" type="button" onclick="signup()" value="S'incscrire">
                                <div class="col-1"></div>
                                <input class="col btn btn-outline-secondary" type="button" value="Se connecter" onclick="to_login()">
                                <div class="col"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="oXHR.js"></script>
        <script src="connect.js"></script>
    </body>
</html>