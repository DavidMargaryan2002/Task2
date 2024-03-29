<?php

include '../Model/Model.php';

class Controller {
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function create() {
        $title = $_POST['title'];
        $content = $_POST['content'];
        if (!empty($title) && !empty($content)) {
            $this->model->insertPost($title, $content);
        } else {
            $_SESSION["error"] = 'The fields must be filled';
            header('Location:../View/Create.php');
            die;
        }
        header('Location:../View/Create.php');
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deletePost($id);
        header('Location:../View/index.php');
    }

    public function update() {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $this->model->updatePost($title, $content, $id);
    }

    public function get() {
        $id = $_GET['id'];
        return $this->model->getPostId($id);
    }

    public function getAll() {
        return $this->model->getPost();
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashPassword = md5($password);
        return $this->model->checkAdmin($email, $hashPassword);
    }
}

