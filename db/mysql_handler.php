<?php

class MySql_Handler extends Db_Helper implements Db_Handler
{
    function __construct()
    {
        $this->setServerConfig("144.202.67.16", "dncvhcwyhn", "vBzpK9HSnw");
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
        return $result ?? "'{}'";
    }

    function getAllTutorials()
    {
        $result = $this->conn->query("SELECT * FROM tezus_tutorials");
        return $this->prepareTutorialListData($result);
    }
}
