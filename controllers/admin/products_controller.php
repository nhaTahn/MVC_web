<?php
require_once 'controllers/admin/path_controller.php';
require_once 'models/product.php';

class ProductsController extends PathController
{
    function  __construct()
    {
        $this->folder = 'products';
    }

    public function index()
    {
        $products = Product::fetchAll();
        $data = array('array' => $products);
        $this->render('index', $data);
    }
}
