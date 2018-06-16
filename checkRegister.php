<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 16/06/2018
 * Time: 09:55
 */

require("infoBDD.php");

$erreur = 0;
if(!isset($_POST["pseudo"])){
    echo "id";
    $erreur = 1;
}
if(!isset($_POST["firstname"])){
    echo "firstname";
    $erreur = 1;
}
if(!isset($_POST["name"])){
    echo "name";
    $erreur = 1;
}
if(!isset($_POST["email"])){
    echo "mail";
    $erreur = 1;
}
if(!isset($_POST["pwd"]) || !isset($_POST["pwd2"]) || $_POST["pwd"] != $_POST["pwd2"]){
    echo "pwd";
    $erreur = 1;
}

if(!$erreur){
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $firstname = htmlspecialchars($_POST["firstname"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $pass = $_POST["pwd"];
    $bdd = new PDO("mysql:host".$host."; dbname=".$db, $user, $pwd);
    $request = $bdd->prepare("INSERT INTO user(user, firstname, name, email, password, salt) VALUES (:user, :firstname, :name, :email, :password, :salt)");
    $request->bindParam(':user', $pseudo);
    $request->bindParam(':firstname', $firstname);
    $request->bindParam(':name', $name);
    $request->bindParam(':email', $email);
    $salt = uniqid();
    $pass = hash("sha512", $pass.$salt);
    $request->bindParam(':password', $pass);
    $request->bindParam(':salt', $salt);
    if($request->execute())
        echo "valid";
    else
        echo "error";
}
else
    echo "errorAll";