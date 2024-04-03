<?php
class Controller {
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }
    public function getAll()
    {
        $postsPerPage = 3;
        $totalPosts = count($this->model->getPost());
        $totalPages = ceil($totalPosts / $postsPerPage);
        $pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($pageNumber - 1) * $postsPerPage;
        $posts = $this->model->getPosts($postsPerPage, $offset);
        include 'View/View.php';
    }

}

