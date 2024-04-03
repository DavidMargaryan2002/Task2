<?php
session_start();
include 'Model/Model.php';
include 'Controller/postControl.php';
switch ($_GET['action']) {
    case 'createPage':
        $controller = new postController();
        $controller->navbar();
        $controller->createPage();
        break;
    case 'Create':
        $controller = new postController();
        $controller->create();
        break;
    case 'View':
        $controller = new postController();
        $controller->checkAdmin();
        $controller->navbar();
        $controller->view();
        break;
    case 'Show':
            $controller = new postController();
            $controller->navbar();
            $controller->show();
        break;
    case 'Delete':
        $controller = new postController();
        $controller->delete();
        break;
    case 'Update':
            $controller = new postController();
            $controller->update();
        break;
    case 'updatePage':
            $controller = new postController();
            $controller->navbar();
            $controller->updatePage();
        break;
    case 'logout':
        $controller = new postController();
        $controller->logout();
        break;
}

