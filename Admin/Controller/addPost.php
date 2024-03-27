<?php

session_start();
require_once '../Model/Model.php';

if (isset($_POST['btn_submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title) && !empty($content)) {
        $model = Model::getInstance();
        $model->insertPost($title, $content);
    } else {
        $_SESSION["error"] = 'The fields must be filled';
        header('location:../View/adminPage.php');
        die;
    }

    header('location:../View/adminPage.php');
}
