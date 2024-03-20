<?php

class UserController extends Controller
{
    public function reg()
    {
        $data = [
            'title' => 'Реєстрація',
            'description' => 'Сторінка реєстрації',
            'message' => ''
        ];

        if (isset($_POST['name'])) {
            $user = $this->model('User');
            $user->setData($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);

            $isValid = $user->validateForm();
            if ($isValid == 'success')
                $user->addUser();
            else
                $data['message'] = $isValid;
        }

        $this->view('user/reg', $data);
    }

    public function auth()
    {
        $data = [
            'title' => 'Авторизація',
            'description' => 'Сторінка авторизації',
        ];

        if (isset($_POST['email'])) {
            $user = $this->model('User');
            $data['message'] = $user->auth($_POST['email'], $_POST['pass']);
        }

        $this->view('user/auth', $data);
    }

    public function dashboard()
    {
        if (!isset($_COOKIE['login'])) {
            header('Location: /user/auth');
            exit();
        }

        $data = [
            'title' => 'Кабінет користувача',
            'description' => 'Сторінка кабінету користувача',
        ];

        $user = $this->model('User');

        // LogOut from account
        if (isset($_POST['exit-btn'])) {
            $user->logOut();
            exit();
        }

        // Insert user image to DB
        if (isset($_POST['MAX_FILE_SIZE'])) {
            $result = $user->validateImage($_FILES['user_image']);

            if (strpos($result, '.')) {
                $user->updateUserImage($result, $_POST['id']);
            } else {
                $data['message'] = $result;
            }
        }

        // Get user info
        $data['user'] = $user->getUser();

        $this->view('user/dashboard', $data);
    }
}
