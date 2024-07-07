<?php


$heading = "Note";

$config = require_once './config.php';
$id = $_GET['id'];
$db = new Database($config['database']);

$note = $db->query(
    "select * from applicationnotes where id = :id",
    [
        "id" => $id,
    ]
)->find();
$user_id = 2;

authorize($note['user_id'] != $user_id);


require_once 'views/notes/show.view.php';
