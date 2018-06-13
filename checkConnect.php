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

var $bdd = new PDO("mysql:host=".$host.";dbname=".$db,$user, $password);

var $request = $bdd->prepare("SELECT user, password, salt FROM user WHERE :user=user");
$request->bind_param(":user", $user);
$request->execute();

var $answer = $request->fetchAll();

if($answer[0][0]==$user && $answer[0][1]==$pass){
    session_start();
    $_SESSION["user"]=$user;
    return 'valid';
}
elseif ($answer[0][0]!=$user){
    return "id";
}
elseif ($answer[0][1]!=$pass){
    return "pwd";
}