<?php

class AdminController
{
    private $username = 'admin';
    private $password = 'admin';

    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if ($_POST['username'] == $this->username && $_POST['password'] == $this->password) {
                $_SESSION['admin'] = true;
                header('Location: /Test/admin');
            } else {
                $_SESSION['error'] = 'Invalid username or password !';
                header('Location: /Test/login');
                exit();
            }
        }
    }
    public function index()
    {
        session_start();

        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: /Test/home');
            exit();
        }
        require_once BASE_PATH . '/View/admin.php';
    }


}



?>