<?php

require_once 'app/core/DB.php';

class User
{
    private $name;
    private $email;
    private $pass;
    private $re_pass;

    private $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function setData($name, $email, $pass, $re_pass)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->re_pass = $re_pass;
    }

    public function getUser()
    {
        $email = $_COOKIE['login'] ?? '';
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function addUser()
    {
        $sql = 'INSERT INTO `users` (`name`, `email`, `pass`) VALUES (:name, :email, :pass)';
        $query = $this->_db->prepare($sql);

        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass]);

        $this->setAuth($this->email);
    }

    public function auth($email, $pass)
    {
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $user = $result->fetch(PDO::FETCH_OBJ);

        if ($user->email == '' || !password_verify($pass, $user->pass))
            return 'Такого користувача не існує!';
        else {
            $this->setAuth($email);
        }
    }

    public function logOut()
    {
        setcookie('login', $this->email, strtotime('-20 minutes', time()), '/');
        unset($_COOKIE['login']);
        header('Location: /user/auth');
    }

    public function validateForm()
    {
        if (strlen($this->name) < 3)
            return 'Ім\'я занадто коротке';
        elseif (strlen($this->email) < 3 || !strpos($this->email, '.'))
            return 'Email введено невірно';
        elseif (strlen($this->pass) < 5)
            return 'Пароль повинен бути не менший 5 символів';
        elseif ($this->pass != $this->re_pass)
            return 'Паролі не співпадають';
        else
            return 'success';
    }

    public function validateImage($image)
    {
        define("UPLOADDIR", 'C:\Games and progs\OSPanel\domains\Shop\public\img\user\\');

        if ($image['size'] == 0)
            return 'Ви не вказали файлу для завантаження';
        elseif ($image['size'] > 500000)
            return 'Об\'єм файлу занадто великий';
        else {
            $image_name = pathinfo($image['name'], PATHINFO_FILENAME);
            $image_ext = pathinfo($image['name'], PATHINFO_EXTENSION);

            // Rename file
            $image_name = time();
            $image_basename = $image_name . '.' . $image_ext;

            $uploadfile = UPLOADDIR . $image_basename;

            if (move_uploaded_file($image['tmp_name'], $uploadfile))
                return $image_basename;
            else
                return 'Сталася помилка із завантаженням зображення';
        }
    }

    public function updateUserImage($image, $id)
    {
        $sql = 'UPDATE `users` SET `image` = :image WHERE `id` = :id';
        $query = $this->_db->prepare($sql);

        $query->execute(['image' => $image, 'id' => $id]);
    }

    private function setAuth($email)
    {
        setcookie('login', $email, strtotime('+10 minutes', time()), '/');
        header('Location: /user/dashboard');
    }
}
