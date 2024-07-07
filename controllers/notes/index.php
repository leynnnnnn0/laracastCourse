<?php


$heading = "Notes";

$config = require_once base_path('config.php');

$db = new Database($config['database']);
$post = $db->query("select * from applicationnotes where user_id = ?", [2]);

$notes =  $post->fetchAll();

view('notes/index.view.php', 
[
    "heading" => "Notes",
    "notes" => $notes
]);