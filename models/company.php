<?php
require_once 'process_connect.php';

class Company
{
    public $id;
    public $name;
    public $address;
    public $createAt;
    public $updateAt;

    public function __construct($id, $name, $address, $createAt, $updateAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
    }

    static function fetchAll()
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM company");
        $rows = $res->fetch_all(MYSQLI_ASSOC);
        $company = [];
        foreach ($rows as $row) {
            $company = new Company(
                $company['id'],
                $company['name'],
                $company['address'],
                $company['createAt'],
                $company['updateAt']
            );
        }

        return $company;
    }

    static function getById($id)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM company WHERE id = $id");
        $row = $res->fetch_assoc();
        $company = new Company(
            $row['id'],
            $row['name'],
            $row['address'],
            $row['createAt'],
            $row['updateAt']
        );

        return $company;
    }

    static function insert($name, $address)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query(
            "INSERT INTO company (name, address, createAt, updateAt) VALUES ('$name', '$address', NOW(), NOW());"
        );

        return $res;
    }

    static function delete($id)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("DELETE FROM company WHERE id = $id");

        return $res;
    }

    static function update($id, $name, $address)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("UPDATE company SET name = '$name', address = '$address', updateAt = NOW() WHERE id = $id;");

        return $res;
    }
}
