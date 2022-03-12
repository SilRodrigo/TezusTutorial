<?php

class MySql_Handler extends Db_Helper implements Db_Handler
{
    function __construct()
    {
        $this->setServerConfig("144.202.67.16", "dncvhcwyhn", "vBzpK9HSnw");
    }

    private function finishDbConnection()
    {
        $this->conn->close();
    }

    private function setServerConfig($servername, $username, $password)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        $this->conn->select_db("dncvhcwyhn");
    }

    function getContentById($id)
    {
        $result = $this->conn->query("SELECT tutorial_content FROM tezus_tutorials WHERE tutorial_id = " . $id);
        $result = $result->fetch_assoc()['tutorial_content'];
        $this->finishDbConnection();
        return $result ?? "'{}'";
    }

    function getAllTutorials()
    {
        $result = $this->conn->query("SELECT * FROM tezus_tutorials");
        $this->finishDbConnection();
        return $this->prepareTutorialListData($result);
    }

    function findUserById($id)
    {
        $result = $this->conn->query("SELECT * FROM tezus_users WHERE id = " . $id);
        if (!$result = $result->fetch_assoc()) return;
        return $result;
    }

    function findUser($name, $password)
    {
        $result = $this->conn->query("SELECT * FROM tezus_users WHERE username = '" . $name . "' AND password = '" . $password . "'");
        if (!$result = $result->fetch_assoc()) return;
        return $result;
    }

    function saveSessionId($id, $session_id)
    {
        $this->conn->query("UPDATE tezus_users SET session_id = " . $session_id . " WHERE id =" . $id);
        $this->conn->commit();
        $this->finishDbConnection();
        return true;
    }

    function saveTutorialEntity($data){
        $this->conn->query("INSERT INTO tezus_tutorials VALUES (0, ".json_encode($data).")");
        $this->conn->commit();
        $this->finishDbConnection();
        return $data;
    }
}
