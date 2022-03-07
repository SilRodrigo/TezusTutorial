<?php

interface Db_Handler
{
  function getAllTutorials();
  function getContentById($id);
  function findUserById($id);
  function findUser($name, $password);
  function saveSessionId($id, $session_id);
}
