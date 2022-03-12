<?php
require_once 'validation.php';
$validation = new Validation();


if (count($_POST) === 0) {
    $validation->validationCaller();
};

if ($_POST['username'] && $_POST['password']) {
    try {
        return $validation->validateUser($_POST['username'], $_POST['password']);
    } catch (\Throwable $th) {
        return print_r($th);
    }
}

if ($_POST['createTutorial']){
    try {
        $validation->insertTutorial($_POST['createTutorial']);
        return print_r($_POST['createTutorial']);
    } catch (\Throwable $th) {
        return print_r($th);
    }
}

$validation->redirectToLogin();