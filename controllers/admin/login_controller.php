<?php
require_once  'models/admin.php';
require_once 'controllers/admin/path_controller.php';

class LoginController extends PathController
{
    function __construct()
    {
        $this->path = 'login';
    }

    public function index()
    {
        $this->render('index');
    }


    public function checkAccount()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isValid = Admin::checkAdmin($username, $password);

        if ($isValid == true) {
            session_start();
            if (!isset($_SESSION['user'])) {
                $_SESSION['user'] = $username;
            }
            header('Location: index.php?page=admin&controller=admin&action=index');
        } else {
            $error = "Tài khoản hoặc mật khẩu không chính xác";
            $data = array('error' => $error);
            $this->render('index', $data);
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?page=admin&controller=admin&action=admin');
    }
}
