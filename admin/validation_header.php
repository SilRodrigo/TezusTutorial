<?php
require_once 'validation.php';
$validation = new Validation();
if (!$validation->validateSession()) $validation->redirectToLogin();
