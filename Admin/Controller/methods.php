<?php

session_start();
include 'postControl.php';

$controller = new Controller();
$_SESSION['post'] =  $controller->getAll();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "Delete":
            $controller->delete();
            header('Location: ../View/index.php');
            break;
        case "Update":
            $controller->update();
            header('Location: ../View/index.php');
            break;
        case "get":
            $_SESSION['array'] = $controller->get();
            header('Location: ../View/Update.php');
            break;
        case "Show":
            $_SESSION['array'] = $controller->get();
            header('Location: ../View/Show.php');
            break;
        case "Create":
            $controller->create();
            header('Location: ../View/index.php');
            break;
        default:
            break;
    }
}


if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION["error"] = 'Fields are required';
        header('Location: ../index.php');
        exit;
    }

    $admins = $controller->login();

    if ($admins < 1) {
        $_SESSION["error"] = 'Wrong login or password';
        header('Location: ../View/Login.php');
        exit;
    }

    $_SESSION["id"] = "key";
    header('Location: ../View/index.php');
    exit;
}


if (isset($_POST['logout'])) {
    unset($_SESSION['id']);
    header('Location: ../View/Login.php');
    exit;
}
