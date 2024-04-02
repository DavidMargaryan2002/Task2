<?php
include 'methods.php';
$_SESSION['include'] = $_GET['action'];
header('Location:../index.php');