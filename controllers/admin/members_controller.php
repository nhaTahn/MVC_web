<?php
require_once 'controllers/admin/path_controller.php';

class MembersController extends PathController
{
    function __construct()
    {
        $this->folder = 'members';
    }

    public function index()
    {
        $this->render('index');
    }
}
