<?php

class PathController
{
    protected $path;

    function render($fileExecute, $data = array())
    {
        $path_view = 'views/admin/' . $this->path . '/' . $fileExecute . '.php';
        if (is_file($path_view)) {

            extract($data);

            ob_start();
            require_once($path_view);
            $pageView = ob_get_clean();

            require_once 'views/admin/basic_layouts.php';
        } else {
            header('Location: index.php?page=admin&controller=layouts&action=error');
        }
    }
}
