<?php

require_once 'Core\Validator.php';
$db = App::container()->resolve(Database::class);

$errors = [];
$description = $_POST['description'];
$id = $_POST['id'];

if (!Validator::string($description, 1, 1000)) {
    $errors['body'] = "A body of no more than 1000 character is required.";
}
if (empty($errors)) {
    $db->query(
        "UPDATE applicationnotes SET body = :body WHERE id = :id",
        [
            ":body" => $description,
            ":id" => $id
        ]
    );
}
$_POST['body'] = '';

header('location: /laracast/index.php/notes');
