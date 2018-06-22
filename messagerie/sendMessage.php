<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 21/06/2018
 * Time: 13:36
 */

session_start();
if ((!isset($_SESSION["user"])) && $_SESSION["user"]==""){
    header("Location: ../connexion/connexion.php");
}

if(isset($_POST['message'])){
    $message = htmlspecialchars($_POST['message']);
    include("../infoBDD.php");
    $bdd = new PDO("mysql:host=$host;dbname=$db",$user, $pwd);
    $request = $bdd->prepare("INSERT INTO message(user1, user2, message) VALUES ((SELECT id FROM user WHERE username=:sender), (SELECT id FROM user WHERE username=:receiver), :message)");
    $request->bindParam(":sender", $_SESSION['pseudo']);
    $request->bindParam(":receiver", $_SESSION['contact']);
    $request->bindParam(":message", $message);
    $request->execute();
    echo "valid";
}