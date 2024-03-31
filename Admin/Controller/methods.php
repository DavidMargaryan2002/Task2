<?php

session_start();
include 'postControl.php';
$controller = new Controller();
$_SESSION['post'] =  $controller->getAll();

if (isset($_POST['Delete'])) {
    $_SESSION['include'] = $_GET['action'];
    header('Location:../View/index.php');
    $controller->delete();
}

if (isset($_POST['Update'])) {
    $controller->update();
    $_SESSION['include'] = $_GET['action'];
    header('Location:../View/index.php');
}

if (isset($_POST['Create'])) {
    $controller->create();
    $_SESSION['include'] = $_GET['action'];
    header('Location:../View/index.php');
}

if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION["error"] = 'Fields are required';
        header('Location:../View/index.php');
        exit;
    }

    $admins = $controller->login();

    if ($admins < 1) {
        $_SESSION["error"] = 'Wrong login or password';
        header('Location:../View/index.php');
        exit;
    }

    $_SESSION["id"] = "key";
    $_SESSION['include'] = $_GET['action'];
    header('Location:../View/index.php');
    exit;
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "Show":
            $_SESSION['array'] = $controller->get();
            break;
        case "Update":
            $_SESSION['array'] = $controller->get();
            break;
        case "logout":
            unset($_SESSION['id']);
            $_SESSION['include'] = $_GET['direction'];
            header('Location:../View/index.php');
            break;
    }
}
