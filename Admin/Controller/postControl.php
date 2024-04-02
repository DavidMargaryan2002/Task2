<?php

include 'Model/Model.php';

class Controller {
    private $model;
    public $id;

    public function __construct()
    {
        $this->model = Model::getInstance();
        if (isset($_GET['id'])){
            $this->id = $_GET['id'];
        }

    }

    public function create()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        if (!empty($title) && !empty($content)) {
            $this->model->insertPost($title, $content);
        } else {
            $_SESSION["error"] = 'The fields must be filled';
            header('Location:../index.php?action=Create');
            die;
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->model->deletePost($id);

    }

    public function update()
    {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $this->model->updatePost($title, $content, $this->id);
    }

    public function get()
    {

        return $this->model->getPostId($this->id);
    }

    public function getAll() {
        return $this->model->getPost();
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashPassword = md5($password);
        return $this->model->checkAdmin($email, $hashPassword);
    }
}

