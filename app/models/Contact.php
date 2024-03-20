<?php

class Contact
{
    private $name;
    private $email;
    private $subject;
    private $message;

    public function setData($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function validateForm()
    {
        if (strlen($this->name) < 3)
            return 'Ім\'я занадто коротке';
        elseif (strlen($this->email) < 3 || !strpos($this->email, '.'))
            return 'Email введено невірно';
        elseif (strlen($this->subject) < 3)
            return 'Тема занадто коротка';
        elseif (strlen($this->message) < 10)
            return 'Повідомлення занадто коротке';
        else
            return 'success';
    }

    public function mail()
    {
        $to = 'dante33@ukr.net';
        $message = 'Ім\'я: ' . $this->name . '. Повідомлення: ' . $this->message;
        $subject = '=?utf-8?B?' . base64_encode($this->subject) . '?=';
        $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
        
        return mail($to, $subject, $message, $headers);
    }
}