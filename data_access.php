<?php

class DataAccess
{
  function __construct()
  {
    $this->setServerConfig("144.202.67.16", "dncvhcwyhn", "vBzpK9HSnw");
    
  }

  protected string $servername;
  protected string $username;
  protected string $password;
  protected $conn;

  function setServerConfig($servername,$username,$password)
  {
    $this->servername = $servername;
    $this->username = $username;
    $this->password = $password;
  }

  public function getContentById($id)
  {
    $result = $this->conn->query("SELECT tutorial_content FROM tezus_tutorials");
    return json_encode($result);
  }
}

?>