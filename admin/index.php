<?php
require_once 'validation.php';
$validation = new Validation();

if (count($_POST) === 0) {
    $validation->validationCaller();
};

if ($_POST['username'] && $_POST['password']) {
    $validation->validateUser($_POST['username'], $_POST['password']);
}

$validation->redirectToLogin();