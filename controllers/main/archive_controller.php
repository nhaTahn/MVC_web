<?php
require_once 'controllers/main/path_controller.php';

class ArchiveController extends PathController
{
    function __construct()
    {
        $this->folder = 'archive';
    }

    public function index()
    {
        $this->render('index');
    }
}
