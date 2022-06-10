<?php
class procDB
{
    public static $connect = NULL;
    public static function getConnect()
    {
        if (!isset(self::$connect)) {
            self::$connect = mysqli_connect("localhost", "root", "", "COMPANY");
            if (mysqli_connect_errno()) {
                die("Can not connect to MySQL:" . mysqli_connect_errno());
            }
        }

        return self::$connect;
    }
}
