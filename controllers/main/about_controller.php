<?php
require_once 'controllers/admin/path_controller.php';

class About extends PathController
{
    function __construct()
    {
        $this->folder = 'about';
    }

    public function index()
    {
        $this->render('index');
    }
}
