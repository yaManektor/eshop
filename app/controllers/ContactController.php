<?php

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Контакти',
            'description' => 'Зворотній зв\'язок',
            'message' => ''
        ];

        if (isset($_POST['name'])) {
            $mail = $this->model('Contact');
            $mail->setData($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);

            $isValid = $mail->validateForm();
            if ($isValid == 'success') {
                if (!$mail->mail())
                    $data['message'] = 'Повідомлення не відправилося :(';
            }
            else
                $data['message'] = $isValid;
        }

        $this->view('contact/index', $data);
    }

    public function about($params = [])
    {
        $data = [
            'title' => 'Про компанію',
            'description' => 'Особливості нашої компанії'
        ];
        $data['params'] = $params;

        $this->view('contact/about', $data);
    }
}