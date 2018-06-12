<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 08/06/2018
 * Time: 15:54
 */

require("infoBDD.php");

if(isset($_POST[user]) && isset($_POST[pass])){
    var $user = $_POST[user];
    var $pass = $_POST[pass];
}

$bdd->new PDO("mysql:host=".$host.";dbname=".$db,$user, $password);

$request = $bdd->prepare("SELECT user, password, salt FROM user WHERE :user=user");
$request->bind_param(":user", $user);
$request->execute();
