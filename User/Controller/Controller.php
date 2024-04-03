<?php
class Controller {
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }
    public function getAll() {
        $post = $this->model->getPost();
        include 'View/View.php';
    }

}

