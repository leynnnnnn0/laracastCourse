<?php

$email = $_POST["email"];
$password = $_POST["password"];


// validate the form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
}
if (!Validator::string($password, 7, 255)) {
    $errors["password"] = "Please provida a password of at least 7 characters.";
}

// check if the account already exists 
$db = App::container()->resolve(Database::class);
$result = $db->query(
    "select * from applicationusers where email = :email",
    [
        ":email" => $email,
    ]
)->find();

// if yes redirect to a login page  

if ($result) {
    $errors['email'] = "Email already registered";
}

if (!empty($errors)) {
    view("registration/create.view.php", [
        "heading" => "Register",
        "errors" => $errors
    ]);
}

// if not save one to the database nad then log the user in and redirect

$db->query(
    "INSERT INTO applicationusers (pwd, email) VALUES (:pwd, :email)",
    [
        ":pwd" => password_hash($password, PASSWORD_BCRYPT),
        ":email" => $email
    ]
);



login($user['email']);

header('location: /laracast/');
exit();
