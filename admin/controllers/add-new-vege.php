<?php

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    redirect('./login.php');
}

$inputs = [];
$errors = [];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    check_empty_input($_POST, $inputs, $errors);
    check_input_file('vege-photo', $_FILES['vege-photo'], $errors);

    // post id
    $vege_post_id = input_post('vege_post_id');

    if (no_errors($errors)) {
        $is_uploaded = upload_file($_FILES['vege-photo'], __DIR__ . '/../../images/vegetables');
        if ($is_uploaded) {

            // store vege
            $vege_name = get_input($inputs, 'vege-name');
            $vege_price = get_input($inputs, 'vege-price');
            $photo = "/$is_uploaded";

            if ($vege_post_id) {
                // update
                update_vege([':id' => $vege_post_id, ':vege_name' => $vege_name, ':vege_price' => $vege_price, ':vege_photo' => $photo]);
                redirect('./index.php?status=Successfully updated the vegetable');
            } else {
                // add
                add_vege([':vege_name' => $vege_name, ':vege_price' => $vege_price, ':vege_photo' => $photo]);
                redirect('?status=Successfully added the vegetable');
            }
        }
    }
}

$vege_id = input_get('vege_id');

if ($vege_id) {

    $vege_record = get_vege_by_id([':id' => $vege_id]);

    $vege_name = $vege_record['vege_name'];
    $vege_price = $vege_record['vege_price'];
    $vege_photo = $vege_record['vege_photo'];

    add_input($inputs, 'vege-name', $vege_name);
    add_input($inputs, 'vege-price', $vege_price);
    add_input($inputs, 'vege-photo', $vege_photo);
}
