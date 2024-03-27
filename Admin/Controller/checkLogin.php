<?php

session_start();
require_once '../Model/Model.php';

if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = md5($password);

    if (empty($email) || empty($password)) {
        $_SESSION["error"] = 'Fields are required';
        header('location:../index.php');
        die;
    }

    $model = Model::getInstance();
    $admins = $model->checkAdmin($email, $hashPassword);
    echo $admins;

    if ($admins < 1) {
        $_SESSION["error"] = 'Wrong login or password  ' . "$admins";
        header('location:../index.php');
        die;
    }

    $_SESSION["id"] = "key";
    header('location:../View/adminPage.php');
}
