<?php

class Model
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $host = 'localhost';
        $db_name = 'task2';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function checkAdmin($email, $hashPassword)
    {
        $query = 'SELECT * FROM `admin` WHERE email = :email AND password = :password';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email, ':password' => $hashPassword]);
        return $stmt->rowCount();
    }

    public function insertPost($title, $content)
    {
        $query = "INSERT INTO post (title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':title' => $title, ':content' => $content]);
    }

    public function getPost()
    {
        $query = 'SELECT * FROM `post`';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePost($id)
    {
        $query = 'DELETE FROM `post` WHERE `post_id` = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
    }


}


