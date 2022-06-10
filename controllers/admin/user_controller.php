<?php
require_once 'controllers/admin/path_controller.php';
require_once 'models/user.php';

class UserController extends PathController
{
    function __construct()
    {
        $this->folder = 'user';
    }

    public function index()
    {
        $user = User::fetchAll();
        $data = array('user' => $user);
        $this->render('index', $data);
    }
}
