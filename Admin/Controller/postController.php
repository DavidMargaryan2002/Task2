<?php
class postController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function createPage()
    {
        include 'View/Create.php';
    }

    public function logout()
    {
        unset($_SESSION['id']);
        include 'View/Login.php';
    }

    public function updatePage()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $arrayShow = $this->model->getPostId($id);
            include 'View/Update.php';
        }
    }

    public function create()
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        if (!empty($title) && !empty($content))
        {
            $this->model->insertPost($title, $content);
            header('Location: index.php?action=View');
            exit;
        } else {
            $_SESSION["error"] = 'Both title and content must be filled';
            header('Location: index.php?action=createPage');
            exit;
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->deletePost($id);
        }
        header('Location: index.php?action=View');
        exit;
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            if (!empty($title) && !empty($content)) {
                $this->model->updatePost($title, $content, $id);
            }
            header('Location: index.php?action=View');
            exit;
        }
    }


    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && $_POST['action'] === 'btn_login') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $hashPassword = md5($password);

            if (empty($email) || empty($password)) {
                $_SESSION["error"] = 'Email and password are required';
                header('Location: index.php');
                exit;
            }

            $admins = $this->model->checkAdmin($email, $hashPassword);

            if ($admins < 1) {
                $_SESSION["error"] = 'Wrong email or password';
                header('Location: index.php');
                exit;
            }

            $_SESSION["id"] = "key";
            header('Location: index.php?action=View');
            exit;
        }
    }

    public function view()
    {
        $arrayView = $this->model->getPost();
        include 'View/View.php';
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $arrayShow = $this->model->getPostId($id);
            include 'View/Show.php';
        }
    }
    public function navbar()
    {
        include 'View/navbar.php';
    }

    public function checkAdmin()
    {
        $this->login();
        if (!isset($_SESSION['id'])) {
            include 'View/Login.php';
            exit;
        }

    }


}
