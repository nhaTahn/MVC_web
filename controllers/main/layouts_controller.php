<?php
require_once('controllers/main/path_controller.php');

class LayoutsController extends PathController
{
    function __construct()
    {
        $this->folder = 'layouts';
    }

    public function index()
    {
        $this->render('index');
    }
}
