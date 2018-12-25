<?php

class ClientController
{
    public function actionAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $options['name'] = strip_tags($_POST['name']);
            $options['phone'] = strip_tags($_POST['phone']);
            $options['email'] = strip_tags($_POST['email']);
            $options['age'] = strip_tags($_POST['age']);

            if (Client::clientExist($options['phone'], $options['email'])) {
                Messages::setMessage('Клиент с таким email или уже телефоном существует!');
                header('Location: /');
                return true;
            }

            if (Client::add($options) != false) {
                Messages::setMessage('Клиент внесен в базу');
                header('Location: /');
                return true;
            } else {
                Messages::setMessage('Произошла ошибка при сохранении в базу');
                header('Location: /');
                return true;
            }
        }
    }
}