<?php
include 'Controller/postControl.php';
$controller = new Controller();
$controller->navbar();
$controller->checkAdmin();

switch ($_GET['action']) {
    case 'createPage':
        $controller->createPage();
        break;
    case 'Create':
        $controller->create();
        break;
    case 'View':
        $controller->view();
        break;
    case 'Show':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->show($id);
        }
        break;
    case 'Delete':
        $controller->delete();
        break;
    case 'Update':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->update($id);
        }
        break;
    case 'updatePage':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->updatePage($id);
        }
        break;
    case 'logout':
        $controller->logout();
        break;
}

