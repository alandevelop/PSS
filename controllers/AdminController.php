<?php

class AdminController
{
    public function actionIndex()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clients = Client::search($_POST);
            $resetBtn = true;
        } else {
            $clients = Client::getList();
            $resetBtn = false;
        }

        require_once ROOT . '/views/admin/index.php';
        return true;
    }

    public function actionRemove(int $id)
    {
        if (Client::remove($id)) {
            Messages::setMessage('Клиент удален');
        } else {
            Messages::setMessage('Произошла ошибка при удалении.');
        }
        header('Location: /admin');
        return true;
    }
}