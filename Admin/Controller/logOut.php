<?php

session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION['id']);
    header('Location:../index.php');
}
