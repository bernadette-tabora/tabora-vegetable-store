<?php


if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
    redirect('./index.php');
}

$inputs = [];
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_empty_input($_POST, $inputs, $errors);

    if (no_errors($errors)) {

        $username = get_input($inputs, 'username');
        $password = get_input($inputs, 'password');

        if (correct_credential($username, $password)) {
            $_SESSION['is_login'] = true;
            redirect('./index.php');
        } else {
            redirect('?status=Wrong username or password');
        }
    }
}
