<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 17/06/2018
 * Time: 17:28
 */

require("infoBDD.php");

$bdd = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);

session_start();
$_SESSION['user']='Flo';
if(isset($_SESSION['contact']) && $_SESSION['contact']!='') {
    $contact = new ArrayObject();
    $request = $bdd->prepare("SELECT s.username, r.username, message FROM message INNER JOIN user s on message.user1 = s.id INNER JOIN user r on message.user2 = r.id WHERE s.username=:sender or r.username=:receiver");
    $request->bindParam(":sender", $_SESSION['user']);
    $request->bindParam(":receiver", $_SESSION['user']);
    $request->execute();
    $messages = $request->fetchAll();

    foreach ($messages as $message) {
        if ($messages[0] == $_SESSION['user'] && $messages[1] == $_SESSION['contact']){
            echo "<div class='send'>$message[2]</div>";
        }
        elseif ($messages[1] == $_SESSION['user'] && $messages[0] == $_SESSION['contact']){
            echo "<div class='receive'>$message[2]</div>";
        }
    }
}
else{
    echo "<div class='receive'>Choissisez une conversation</div>";
}