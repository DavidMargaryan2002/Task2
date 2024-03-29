<?php
if(!isset($_SESSION['id'])){
    header('Location:../View/Login.php');
}
