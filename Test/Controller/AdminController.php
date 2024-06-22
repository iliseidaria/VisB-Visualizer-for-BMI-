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
                header('Location: /Test/View/admin.php');
            } else {
                $_SESSION['error'] = 'Invalid username or password';
                header('Location: /Test/View/login.php');
            }
        }
    }


}



?>