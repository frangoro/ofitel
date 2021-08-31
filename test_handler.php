<?php
require './ChromePhp.php';
ChromePhp::log('Hello console!');
$errors = [];
$data = [];


if (empty($_POST['contactName'])) {
    $errors['contactName'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);