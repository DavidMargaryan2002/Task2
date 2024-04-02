<?php
session_start();
if (isset($_SESSION['id'])) {
    include 'View/navbar.php';
    $x = $_SESSION['include'];
    include "View/$x.php";
    die;
} else {
    include 'View/Login.php';
}




