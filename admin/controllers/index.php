
<?php
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    redirect('./login.php');
}

$veges = get_vege();


$vege_id = input_get('vege_id');

if ($vege_id) {
    delete_vege([':id' => $vege_id]);
    redirect('?status=Vegetable successfully deleted');
}

$vege_status = input_get('status');
