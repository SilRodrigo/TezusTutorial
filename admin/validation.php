<?php



class Validation
{
    function __construct()
    {
        require '../config_paths.php';
        require_once '../db/data_access.php';
        $this->dataAccess = new DataAccess(DB_NAME);
    }

    function redirectOnError()
    {
        header("Location: ./");
        $this->dataAccess->finishDbConnection();
        die();
    }

    function redirectToLogin($server_response = null)
    {
        $response = "Location: ./login.php";
        if ($server_response) $response = "Location: ./login.php?" . $server_response;
        header($response);
        $this->dataAccess->finishDbConnection();
        die();
    }

    function loginSuccessful()
    {
        header("Location: ./create_tutorial.php");
        $this->dataAccess->finishDbConnection();
        die();
    }

    function validateSession()
    {
        $user_session = $_COOKIE['session_id'];
        if ($user_session) {
            $user_session = str_split($user_session);
            $user_id = (int) $user_session[0];
            $user_session = implode('', $user_session);
            $user = $this->dataAccess->findUserById($user_id);
            if ($user['session_id'] == $user_session) return true;
        };
        if ($_COOKIE['session_id']) unset($_COOKIE['session_id']);
        return false;
    }

    function validateUser($username, $password)
    {
        return print_r('aq');
        $response = $this->dataAccess->findUserByCredentials($username, $password);
        if (!$response) return $this->redirectToLogin("server_response=Digitou negocio errado ai bixo...");
        if (!$sessionId = $this->dataAccess->generateSessionId($response['id'])) return $this->redirectOnError();
        setcookie("session_id", $sessionId);
        $this->loginSuccessful();
    }

    function validationCaller()
    {
        $response = $this->validateSession($this->dataAccess);
        if ($response) $this->loginSuccessful();
        $this->redirectToLogin();
    }

    function insertTutorial($data){
        return $this->dataAccess->insertTutorial($data);
    }
}
