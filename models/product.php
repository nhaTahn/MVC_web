<?php
require_once 'process_connect.php';

class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $content;
    public $img;

    public function __construct($id, $name, $price, $description, $content, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->content = $content;
        $this->img = $img;
    }

    static function fetchAll()
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM product");
        $rows = $res->fetch_array(MYSQLI_ASSOC);
        $products = [];
        foreach ($rows as $row) {
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['price'],
                $row['description'],
                $row['content'],
                $row['img']
            );
        }

        return $products;
    }

    static function get($id)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM product WHERE id=$id");
        $row = $res->fetch_assoc();
        $product = new Product(
            $row['id'],
            $row['name'],
            $row['price'],
            $row['description'],
            $row['content'],
            $row['img']
        );

        return $product;
    }

    static function insert($name, $price, $description, $content, $img)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("INSERT INTO product (name, price, description, content, img)
        VALUES ('$name', $price, '$description', '$content', '$img');");

        return $res;
    }

    static function removeId($id)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("DELETE FROM product WHERE id=$id");

        return $res;
    }

    static function update($id, $name, $price, $description, $content, $img)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("UPDATE product
        SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img'
        WHERE id = $id;");
    }
}
