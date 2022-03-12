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
    require_once(strtolower($dbHandler) . '_handler.php');
    $db_handshake = $dbHandler . '_Handler';
    $this->dbConnection = new $db_handshake;
  }

  public function finishDbConnection(){
    $this->dbConnection->finishDbConnection();
  }

  public function getContentById($id)
  {
    return $this->dbConnection->getContentById($id);
  }

  public function getAllTutorials()
  {
    return $this->dbConnection->getAllTutorials();
  }

  public function findUserById($id)
  {
    return $this->dbConnection->findUserById($id);
  }

  public function findUserByCredentials($username, $password)
  {
    return $this->dbConnection->findUser($username, $password);
  }

  public function generateSessionId($id)
  {
    $sessionId = $id . rand();
    if (!$this->dbConnection->saveSessionId($id, $sessionId)) return;
    return $sessionId;
  }

  public function insertTutorial($tutorial){
    return $this->dbConnection->saveTutorialEntity($tutorial);
  }
}
