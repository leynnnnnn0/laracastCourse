<?php

$config = require_once './config.php';
$id = $_GET['id'];
$db = new Database($config['database']);

$db->query(
    "DELETE FROM applicationnotes WHERE id = :id",
    [":id" => $_POST['id']]
);
header('location: /laracast/index.php/notes');
exit();