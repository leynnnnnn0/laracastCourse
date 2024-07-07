<?php


$id = $_GET['id'];
$db = App::container()->resolve(Database::class);

$note = $db->query(
    "select * from applicationnotes where id = :id",
    [
        "id" => $id,
    ]
)->find();
$user_id = 2;


authorize($note['user_id'] != $user_id);

view(
    'notes/edit.view.php',
    [
        "heading" => "Edit note",
        "note" => $note
    ]
);
