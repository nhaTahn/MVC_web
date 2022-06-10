<?php
require_once 'controllers/main/path_controller.php';
require_once 'models/company.php';

class ContactController extends PathController
{
    function __construct()
    {
        $this->folder = 'contact';
    }

    public function index()
    {
        $company = Company::fetchAll();
        $data = array('company' => $company);
        $this->render('index', $data);
    }
}
