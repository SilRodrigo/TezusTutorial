<?php

class DataAccess
{
  protected $servername;
  protected $username;
  protected $password;
  protected $conn;
  protected $dbConnection;

  function __construct($dbHandler)
  {
    require_once('dbhelper.php');
    require_once('handler_interface.php');
    require_once('mysql_handler.php');
    require_once('mock_handler.php');
    $db_handshake = $dbHandler . '_Handler';
    $this->dbConnection = new $db_handshake;
  }

  public function getContentById($id)
  {
    return $this->dbConnection->getContentById($id);
  }

  public function getAllTutorials()
  {
    return $this->dbConnection->getAllTutorials();
  }
}
