<?php

include '../Model/Model.php';

class Control {
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }
    public function getAll() {
        return $this->model->getPost();
    }


}

