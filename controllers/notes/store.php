<?php

require_once 'Core\Validator.php';
$db = App::container()->resolve(Database::class);

$errors = [];
$description = $_POST['description'];
if (!Validator::string($description, 1, 1000)) {
    $errors['body'] = "A body of no more than 1000 character is required.";
}
if (empty($errors)) {
    $db->query(
        "INSERT INTO applicationnotes (body, user_id) VALUES (:body, :user_id)",
        [
            ":body" => $description,
            ":user_id" => 2
        ]
    );
}
$_POST['body'] = '';

header('location: /laracast/index.php/notes');
