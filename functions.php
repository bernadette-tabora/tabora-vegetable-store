<?php

// app url
define('APP_URL', isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' . $_SERVER['HTTP_HOST']);


#image url
define('IMG_URL', APP_URL . '/vegetable-store/images/vegetables');

#database credetials
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'vege_store');

#owner credential
define('USERNAME', 'user101');
define('PWD', 'user101-2022');

#query functions

function connect()
{
    $host = HOST;
    $user = USER;
    $password = PASSWORD;
    $dbname = DB_NAME;


    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password);
        if ($pdo) {
            return $pdo;
        }
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
}

function delete_vege(array $params)
{
    $sql = "DELETE FROM vegetables WHERE id = :id";
    $stmt = connect()->prepare($sql);
    return  $stmt->execute($params);
}


function add_vege($params)
{
    $sql = "INSERT INTO vegetables (vege_name, vege_price, vege_photo) VALUES (:vege_name, :vege_price, :vege_photo)";
    $stmt = connect()->prepare($sql);
    return $stmt->execute($params);
}

function update_vege($params)
{
    $sql = "UPDATE vegetables SET vege_name = :vege_name, vege_price = :vege_price, vege_photo = :vege_photo WHERE id = :id";
    $stmt = connect()->prepare($sql);
    return $stmt->execute($params);
}

function get_vege()
{
    $sql = "SELECT * FROM vegetables ORDER BY id DESC";
    $stmt = connect()->query($sql);
    return  $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_vege_by_id($params)
{
    $sql = "SELECT * FROM vegetables WHERE id = :id";
    $stmt = connect()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

#validate login

function correct_credential($username, $password)
{
    return (USERNAME === $username) && (PWD === $password);
}



#input functions

function input_post($name): mixed
{
    return isset($name) && !empty($_POST[$name]) ? $_POST[$name] : null;
}

function input_get($name): mixed
{
    return isset($name) && !empty($_GET[$name]) ? $_GET[$name] : null;
}

function check_empty_input($post, &$inputs, &$errors)
{
    foreach ($post as $name => $value) {
        if (isset($name) && !empty($value)) {
            add_input($inputs, $name, $value);
        } else {
            add_error($errors, $name);
        }
    }
}

function add_error(&$errors, $name, $error = 'This field is required'): void
{
    $errors[$name] = $error;
}

function get_error(&$errors, $name): mixed
{
    return isset($errors[$name]) ? $errors[$name] : null;
}



function add_input(array &$inputs, $name, $value): void
{
    $inputs[$name] = $value;
}



function get_input(array &$inputs, $name): mixed
{
    return isset($inputs[$name]) ? $inputs[$name] : null;
}

function no_errors(&$errors)
{
    return count($errors) === 0;
}



// check uploaded file
function check_input_file(string $name, array $file, &$errors)
{

    if (isset($file) && !empty($file)) {
        // checkuploaded files
        if (is_uploaded_file($file['tmp_name']) && $file['error'] === 0) {

            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");

            $file_name = $file['name'];
            $file_type = $file['type'];
            $file_size = $file['size'];



            // check if extension is valid
            $extention = pathinfo($file_name, PATHINFO_EXTENSION);

            if (!array_key_exists($extention, $allowed)) {
                add_error($errors, $name, 'File format is not valid');
            }

            // check image size
            $maxsize = 5 * 1024 * 1024;
            if (
                $file_size > $maxsize
            ) {
                add_error($errors, $name, 'Image size is maximum of 5MB');
            }


            // Verify MYME type of the file
            if (!in_array($file_type, $allowed)) {
                add_error($errors, $name, 'Something wrong please try again');
            }
        } else {
            add_error($errors, $name, 'Please select a photo');
        }
    } else {
        add_error($errors, $name);
    }
}

// upload files
function upload_file(array $file, $dir = null)
{
    $file_name = $file['name'];

    $extention =
        pathinfo($file_name, PATHINFO_EXTENSION); // get file extension

    // add random string name
    $hash_name = uniqid('EARVEGE_', true) . ".$extention";

    $tmp_name = $file['tmp_name'];

    if (move_uploaded_file($tmp_name, $dir . "/$hash_name")) {
        return $hash_name;
    }
}


#http methods
function redirect($location)
{
    header("Location: $location");
    exit;
}
