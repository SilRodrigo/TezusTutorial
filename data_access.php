<?php

class DataAccess
{
  protected $servername;
  protected $username;
  protected $password;
  public $conn;

  function __construct()
  {
    $this->setServerConfig("144.202.67.16", "dncvhcwyhn", "vBzpK9HSnw");
    $this->conn = new mysqli($this->servername, $this->username, $this->password);
    $this->conn->select_db("dncvhcwyhn");
  }

  function setServerConfig($servername,$username,$password)
  {
    $this->servername = $servername;
    $this->username = $username;
    $this->password = $password;
  }

  public function getContentById($id)
  {        
    $result = $this->conn->query("SELECT tutorial_content FROM tezus_tutorials WHERE tutorial_id = ".$id);
    $result = $result->fetch_assoc()['tutorial_content'];    
    return $result->fetch_assoc()['tutorial_content'] ?? "'{}";
  }
}
