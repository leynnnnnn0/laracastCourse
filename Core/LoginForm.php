<?php

class LoginForm
{
    public $errors = [];
    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = "Please provide a valid email address";
        }
        if (!Validator::string($password, 7, 255)) {
            $this->errors["password"] = "Please provida a password of at least 7 characters.";
        }

        return empty($this->errors);
    }
}
