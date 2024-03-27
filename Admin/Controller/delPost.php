<?php

require_once '../Model/Model.php';

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $model = Model::getInstance();
    $model->deletePost($id);
    header('Location:../View/adminPage.php');
}
