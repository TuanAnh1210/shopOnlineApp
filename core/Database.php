<?php
class Database
{

    public function connect()
    {
        $server_name = "host=127.0.0.1";
        $dbname = "du_an_mau";
        $username = "root";
        $password = "";
        try {
            $connect = new PDO("mysql:$server_name;dbname=$dbname;charset=utf8", $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch (PDOException $e) {
            echo "Connection false" . $e->getMessage();
        }
    }

    public function execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $connect = $this->connect();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($connect);
        }
    }

    public function query_all($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $connect = $this->connect();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($connect);
        }
    }

    public function query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $connect = $this->connect();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($connect);
        }
    }

    public function query_value($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $connect = $this->connect();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($connect);
        }
    }
}