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
        $conditionParams = [];

        if (!empty($_POST['name'])) {
            $conditionParams['name'] = $_POST['name'];
        }
        if (!empty($_POST['phone'])) {
            $conditionParams['phone'] = $_POST['phone'];
        }
        if (!empty($_POST['email'])) {
            $conditionParams['email'] = $_POST['email'];
        }
        if (!empty($_POST['age'])) {
            $conditionParams['age'] = $_POST['age'];
        }

        $db = Db::getInstance();
        $sql = "SELECT * FROM clients";


        if (!empty($conditionParams)){
            $sql .= " WHERE ";

            if (count($conditionParams) > 1) {
                if (array_key_exists('name', $conditionParams)) {
                    $sql .= "name=:name AND ";
                }
                if (array_key_exists('phone', $conditionParams)) {
                    $sql .= "phone=:phone AND ";
                }
                if (array_key_exists('email', $conditionParams)) {
                    $sql .= "email=:email AND ";
                }
                if (array_key_exists('age', $conditionParams)) {
                    $sql .= "age=:age";
                }
            } else {
                if (array_key_exists('name', $conditionParams)) {
                    $sql .= "name=:name";
                }
                if (array_key_exists('phone', $conditionParams)) {
                    $sql .= "phone=:phone";
                }
                if (array_key_exists('email', $conditionParams)) {
                    $sql .= "email=:email";
                }
                if (array_key_exists('age', $conditionParams)) $sql .= "age=:age";
            }

            $statment = $db->prepare($sql);

            if (array_key_exists('name', $conditionParams)) {
                $statment->bindParam(':name', $conditionParams['name']);
            }
            if (array_key_exists('phone', $conditionParams)) {
                $statment->bindParam(':phone', $conditionParams['phone']);
            }
            if (array_key_exists('email', $conditionParams)) {
                $statment->bindParam(':email', $conditionParams['email']);
            }
            if (array_key_exists('age', $conditionParams)) $statment->bindParam(':age', $conditionParams['age']);

            $statment->execute();
            return $statment->fetchAll(PDO::FETCH_ASSOC);
        }

        $statment = $db->prepare($sql);
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
}