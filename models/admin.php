<?php
require 'process_connect.php';

class Admin
{
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    static function insert($username, $password)
    {
        $password = password_hash($password, PASSWORD_ARGON2ID, ['cost' => 15]);
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("INSERT INTO ADMIN (username, password) VALUES('$username', '$password')");

        return $res;
    }

    static function delete($username)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("DELETE FROM admin WHERE username = '$username' ");

        return $res;
    }

    static function checkAdmin($username, $password)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM admin WHERE username ='$username'");
        $password_DB = $res->fetch_assoc()['password'];

        return (password_verify($password, $password_DB) ? true : false);
    }

    static function changePassword($username, $currentPassword, $newPassword)
    {
        if (Admin::checkAdmin($username, $currentPassword) == true) {
            $password = password_hash($newPassword, PASSWORD_ARGON2ID, ['cost' => 15]);
            $db_connect = procDB::getConnect();
            $res = $db_connect->query("UPDATE admin SET password = '$password' WHERE username = '$username'");

            return $res;
        } else return false;
    }

    static function fetchAll()
    {
        $db = procDB::getConnect();
        $req = $db->query("SELECT * FROM admin");
        $admins = [];
        $rows = $req->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row)
            $admins[] = new Admin(
                $row['username'],
                $row['password']
            );
        return $admins;
    }
}
