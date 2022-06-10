<?php
require 'models/admin.php';
require 'controllers/admin/base_controller.php';

class AdminController extends PathController
{
    function __construct()
    {
        $this->path = 'admin';
    }

    public function add()
    {
        Admin::insert($_POST['username'], $_POST['password']);
        header('Location: index.php?page=admin&controller=admin&action=index');
    }

    public function edit()
    {
        Admin::changePassword($_POST['username'], $_POST['current_password'], $_POST['new_password']);
        header('Location: index.php?page=admin&controller=admin&action=index');
    }

    public function delete()
    {
        Admin::delete($_POST['username']);
        header('Location: index.php?page=admin?controller=admin&action=index');
    }
}
