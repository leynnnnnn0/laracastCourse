<?php

// login the user if the credentials match.


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if (!empty($errors)) {
        view("registration/create.view.php", [
            "heading" => "Register",
            "errors" => $form->errors
        ]);
    }
}

// validate the form inputs
// $errors = [];
// if (!Validator::email($email)) {
//     $errors['email'] = "Please provide a valid email address";
// }
// if (!Validator::string($password, 7, 255)) {
//     $errors["password"] = "Please provida a password of at least 7 characters.";
// }

$auth = new Authenticate();

if ($auth->attempt($email, $password)) {
    header(("location: /laracast/"));
} else {
    dd("Incorrect password");
}



// match the credentials

// $result = $db->query("SELECT * FROM applicationusers WHERE email = :email", [
//     ":email" => $email,
// ])->find();

// if (!$result) {
//     view("registration/create.view.php", [
//         "heading" => "Register",
//         "errors" => "No matching email address"
//     ]);
// }

// if (password_verify($password, $result['pwd'])) {
//     login([
//         "email" => $email
//     ]);

//     header("location: /laracast/");
// }
