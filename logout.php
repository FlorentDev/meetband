<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 22/06/2018
 * Time: 22:11
 */

session_start();
unset($_SESSION['user']);
unset($_SESSION['contact']);
session_destroy();
header("Location: index.php");