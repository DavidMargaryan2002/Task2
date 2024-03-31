<?php
include '../Controller/methods.php';

if (isset($_SESSION['id'])) {
    include 'navbar.php';
    $x = $_SESSION['include'];
    include "$x.php";
    die;
} else {
    include 'Login.php';
}




