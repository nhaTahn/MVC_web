<?php
require_once 'process_connect.php';

class User
{
    public $email;
    public $profile_photo;
    public $fname;
    public $lname;
    public $gender;
    public $age;
    public $phone;
    public $createAt;
    public $updateAt;
    public $password;

    public function __construct($email, $profile_photo, $fname, $lname, $gender, $age, $phone, $createAt, $updateAt, $password)
    {
        $this->email = $email;
        $this->profile_photo = $profile_photo;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->age = $age;
        $this->phone = $phone;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->password = $password;
    }

    static function fetchAll()
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM user");
        $rows = $res->fetch_all(MYSQLI_ASSOC);
        $users = [];
        foreach ($rows as $row) {
            $users[] = new User(
                $row['email'],
                $row['profile_photo'],
                $row['fname'],
                $row['lname'],
                $row['gender'],
                $row['age'],
                $row['phone'],
                $row['createAt'],
                $row['updateAt'],
                ''
            );
        }

        return $users;
    }

    static function get($email)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("
        SELECT email, profile_photo, fname, lname, gender, age, phone, createAt, updateAt
        FROM user
        WHERE email = '$email'
        ;");

        $result = $res->fetch_assoc();
        $user = new User(
            $result['email'],
            $result['profile_photo'],
            $result['fname'],
            $result['lname'],
            $result['gender'],
            $result['age'],
            $result['phone'],
            $result['createAt'],
            $result['updateAt'],
            '' // Do not return password
        );

        return $user;
    }

    static function insert($email, $profile_photo, $fname, $lname, $gender, $age, $phone, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db_connect = procDB::getConnect();
        $res = $db_connect->query(
            "
            INSERT INTO user (email, profile_photo, fname, lname, gender, age, phone, createAt, updateAt, password)
            VALUES ('$email', '$profile_photo', '$fname', '$lname', $gender, $age, '$phone', NOW(), NOW(), '$password')
            ;"
        );
        return $res;
    }

    static function update($email, $profile_photo, $fname, $lname, $gender, $age, $phone)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query(
            "
            UPDATE user
            SET profile_photo = '$profile_photo', fname = '$fname', lname = '$lname', gender = $gender, age = $age, phone = '$phone', updateAt = NOW()
            WHERE email = '$email'
            ;"
        );
        return $res;
    }

    static function checkUser($email, $password)
    {
        $db_connect = procDB::getConnect();
        $res = $db_connect->query("SELECT * FROM user WHERE email = '$email'");
        if (@password_verify($password, $res->fetch_assoc()['password']))
            return true;
        else
            return false;
    }

    static function changePassword($email, $oldpassword, $newpassword)
    {
        if (User::checkUser($email, $oldpassword)) {
            $password = password_hash($newpassword, PASSWORD_ARGON2ID, ['cost' => 15]);
            $db_connect = procDB::getConnect();
            $res = $db_connect->query(
                "UPDATE user
                SET password = '$password', updateAt = NOW()
                WHERE email = '$email';"
            );
            return $res;
        } else {
            return false;
        }
    }
}
