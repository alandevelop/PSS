<?php

class Client
{
    public static function add($options)
    {
        $db = Db::getInstance();
        $sql = "INSERT INTO clients(name, phone, email, age) VALUES (:name, :phone, :email, :age)";

        $result = $db->prepare($sql);

        $result->bindParam(':name', $options['name']);
        $result->bindParam(':phone', $options['phone']);
        $result->bindParam(':email', $options['email']);
        $result->bindParam(':age', $options['age']);
        return $result->execute();
    }

    public static function clientExist(string $phone, string $email)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM clients WHERE email=:email OR phone=:phone";

        $statment = $db->prepare($sql);
        $statment->bindParam(':phone', $phone);
        $statment->bindParam(':email', $email);

        $statment->execute();
        $row = $statment->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getList(): array
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM clients";

        $statement = $db->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function remove(int $id)
    {
        $db = Db::getInstance();
        $sql = "DELETE FROM clients WHERE id = $id";

        if ($db->exec($sql)) {
            return true;
        }

        return false;
    }

    public static function search($post)
    {
        $name = empty($_POST['name']) ? false : $_POST['name'];
        $phone = empty($_POST['phone']) ? false : $_POST['phone'];
        $email = empty($_POST['email']) ? false : $_POST['email'];
        $age = empty($_POST['age']) ? false : $_POST['age'];

        $db = Db::getInstance();
        $sql = "SELECT * FROM clients";

        if ($name || $phone || $email || $age) {
            $sql .= " WHERE ";
            if ($name) {
                $sql .= "name=:name AND ";
            }
            if ($phone) {
                $sql .= "phone=:phone AND ";
            }
            if ($email) {
                $sql .= "email=:email AND ";
            }
            if ($age) {
                $sql .= "age=:age";
            }

            $statment = $db->prepare($sql);

            if ($name) {
                $statment->bindParam(':name', $name);
            }
            if ($phone) {
                $statment->bindParam(':phone', $phone);
            }
            if ($email) {
                $statment->bindParam(':email', $email);
            }
            if ($age) {
                $statment->bindParam(':age', $age);
            }

            $statment->execute();
            return $statment->fetchAll(PDO::FETCH_ASSOC);
        }

        $statment = $db->prepare($sql);
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
}