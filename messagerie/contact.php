<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 17/06/2018
 * Time: 17:28
 */

require("../infoBDD.php");

$bdd = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);

session_start();
$contact = new ArrayObject();
$request = $bdd->prepare("SELECT s.username, r.username FROM message INNER JOIN user s on message.user1 = s.id INNER JOIN user r on message.user2 = r.id WHERE s.username=:sender or r.username=:receiver");
$request->bindParam(":sender", $_SESSION['user']);
$request->bindParam(":receiver",$_SESSION['user']);
$request->execute();
$messages = $request->fetchAll();

foreach ($messages as $message) {
    $exist = 0;
    foreach ($contact as $one) {
        if ($one == $message[0] || $one == $message[1])
            $exist = 1;
    }
    if (!$exist) {
        if ($message[0] == $_SESSION['user'] && isset($_SESSION['contact']) && $_SESSION['contact']==$message[1]) {
            echo "<div class='nav-item'><a class='nav-link active' href='#' onclick='changeContact(\"".$message[1]."\")'>".$message[1]. "</a></div>";
            $contact->append($message[1]);
        }
        elseif ($message[1] == $_SESSION['user'] && isset($_SESSION['contact']) && $_SESSION['contact']==$message[0]) {
            echo "<div class='nav-item active'><a class='nav-link active' href='#' onclick='changeContact(\"" . $message[0] . "\")'>" . $message[0] . "</a></div>";
            $contact->append($message[1]);
        }
        elseif ($message[0] == $_SESSION['user']) {
            echo "<div class='nav-item'><a class='nav-link' href='#' onclick='changeContact(\"".$message[1]."\")'>".$message[1]. "</a></div>";
            $contact->append($message[1]);
        }
        elseif ($message[1] == $_SESSION['user']) {
            echo "<div class='nav-item'><a class='nav-link' href='#' onclick='changeContact(\"".$message[0]."\")'>" . $message[0] . "</a></div>";
            $contact->append($message[1]);
        }
    }
}