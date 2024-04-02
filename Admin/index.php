<?php
session_start();
include 'View/navbar.php';
include 'Controller/postControl.php';

$controller = new Controller();
$_SESSION['post'] = $controller->getAll();
$_SESSION['array'] = $controller->get();

if (isset($_POST['action']) && $_POST['action'] == 'btn_login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION["error"] = 'Fields are required';
        header('Location: index.php');
        exit;
    }

    $admins = $controller->login();

    if ($admins < 1) {
        $_SESSION["error"] = 'Wrong login or password';
        header('Location: index.php');
        exit;
    }

    $_SESSION["id"] = "key";
    header('Location: index.php?action=View');
    exit;
}

if (!isset($_SESSION['id'])) {
    include 'View/Login.php';
    die;
} else {
    if (isset($_GET['action'])) {
        $actionGet = $_GET['action'];
        if ($actionGet == 'Login') {
            unset($_SESSION['id']);
        }
        include "View/$actionGet.php";
    }
    if (isset($_POST['action'])) {
        $actionPost = $_POST['action'];
        $controller->$actionPost();
        header('Location: index.php?action=View');
    }
}

