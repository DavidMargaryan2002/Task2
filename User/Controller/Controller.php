<?php
class Controller {
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }
    public function getAll()
    {
        $posts = $this->model->getPost();
        $totalPosts = count($posts);
        $postsPerPage = 4;
        $totalPages = ceil($totalPosts / $postsPerPage);
        $currentpage = $_GET['page'] ?? 1;
        $offset = ($currentpage - 1) * $postsPerPage;
        $postsToDisplay = array_slice($posts, $offset, $postsPerPage);
        include 'View/View.php';
    }

}

