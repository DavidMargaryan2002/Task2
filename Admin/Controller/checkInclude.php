<?php
include 'methods.php';
$_SESSION['include'] = $_GET['action'];
header('Location:../View/index.php');