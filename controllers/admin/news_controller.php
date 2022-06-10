<?php
require_once 'controllers/admin/path_controller.php';
require_once 'models/news.php';

class NewsController extends PathController
{
    function __construct()
    {
        $this->folder = 'news';
    }

    public function index()
    {
        $news = News::fetchAll();
        $data = array('new' => $news);
        $this->render('index', $data);
    }

    public function add()
    {
        News::insert($_POST['title'], $_POST['description'], $_POST['content']);
        header('Location: index.php?page=admin&controller=news&action=index');
    }

    public function edit()
    {
        News::update($_POST['id'], $_POST['title'], $_POST['description'], $_POST['content']);
        header('Location: index.php?page=admin&controller=news&action=index');
    }

    public function removeId()
    {
        News::removeId($_POST['id']);
        header('Location: index.php?page=admin&controller=news&action=index');
    }
}
