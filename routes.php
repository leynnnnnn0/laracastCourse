<?php

// return [  
//     "/laracast/" => 'controllers/index.php',
//     "/laracast/index.php/about" => 'controllers/about.php',
//     "/laracast/index.php/contact" => 'controllers/contact.php',
//     "/laracast/index.php/notes" => 'controllers/notes/index.php',
//     "/laracast/index.php/note" => 'controllers/notes/show.php',
//     "/laracast/index.php/notes/create" => 'controllers/notes/create.php',
// ];

// Main pages
$router->get("/laracast/", 'controllers/index.php');
$router->get("/laracast/index.php/about", 'controllers/about.php');
$router->get("/laracast/index.php/contact", 'controllers/contact.php');

// Notes pages 
$router->get("/laracast/index.php/notes", 'controllers/notes/index.php')->only('auth');
$router->get("/laracast/index.php/note", 'controllers/notes/show.php');
$router->get("/laracast/index.php/notes/create", 'controllers/notes/create.php');
$router->delete("/laracast/index.php/note", 'controllers/notes/destroy.php');
$router->post("/laracast/index.php/note", 'controllers/notes/store.php');
$router->get("/laracast/index.php/note/edit", 'controllers/notes/edit.php');
$router->put("/laracast/index.php/note/edit", 'controllers/notes/update.php');

// Registraion
$router->get("/laracast/index.php/register", "controllers/registration/create.php")->only('guest');
$router->post("/laracast/index.php/register", "controllers/registration/store.php");

// Login
$router->get("/laracast/index.php/login", "controllers/session/create.php")->only('guest');
$router->post("/laracast/index.php/login", "controllers/session/store.php")->only('guest');
$router->delete("/laracast/index.php/session", "controllers/session/destroy.php")->only('auth');
