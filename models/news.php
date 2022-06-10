<?php
require_once 'process_connect.php';

class News
{
    public $id;
    public $status;
    public $date;
    public $title;
    public $description;
    public $content;

    public function __construct($id, $status, $date, $title, $description, $content)
    {
        $this->id = $id;
        $this->status = $status;
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
    }

    static function fetchAll()
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM news ORDER BY date DESC");
        $rows = $res->fetch_array(MYSQLI_ASSOC);
        $array = [];
        foreach ($rows as $row) {
            $array[] = new News(
                $row['id'],
                $row['status'],
                $row['date'],
                $row['title'],
                $row['description'],
                $row['content']
            );
        }
        return $array;
    }

    static function insert($title, $description, $content)
    {
        $status = true;
        $date = date("Y-m-d-h-i-s");
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("INSERT INTO news (status, date, title, description, content) VALUES ($status, '$date', '$title', '$description', '$content') ");
    }

    static function getId($id)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT *FROM news WHERE id ='$id'");
        $rowId = $res->fetch_assoc();
        $news = new News(
            $rowId['id'],
            $rowId['status'],
            $rowId['date'],
            $rowId['title'],
            $rowId['description'],
            $rowId['content']
        );

        return $news;
    }

    static function removeId($id)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("DELETE FROM news WHERE id = $id");
        return $res;
    }

    static function update($id, $title, $description, $content)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("UPDATE news SET title='$title', description='$description', content='$content' WHERE id=$id;");
        return  $res;
    }
}
