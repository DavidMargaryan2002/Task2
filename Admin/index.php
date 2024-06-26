<?php
session_start();
include 'Model/Model.php';
include 'Controller/PostController.php';
$action = $_GET['action'] ?? Null;
switch ($action) {
    case 'createPage':
        $controller = new PostController();
        $controller->navbar();
        $controller->createPage();
        break;
    case 'Create':
        $controller = new PostController();
        $controller->create();
        break;
    case 'View':
        $controller = new PostController();
        $controller->checkAdmin();
        $controller->navbar();
        $controller->view();
        break;
    case 'Show':
            $controller = new PostController();
            $controller->navbar();
            $controller->show();
        break;
    case 'Delete':
        $controller = new PostController();
        $controller->delete();
        break;
    case 'Update':
            $controller = new PostController();
            $controller->update();
        break;
    case 'updatePage':
            $controller = new PostController();
            $controller->navbar();
            $controller->updatePage();
        break;
    case 'logout':
        $controller = new PostController();
        $controller->logout();
        break;
    default:
        $controller = new PostController();
        $controller->logout();
        break;
}

