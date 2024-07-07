<?php

class Authenticate
{
    public function attempt($email, $password)
    {
        $db = App::container()->resolve('Database');
        $user = $db->query("SELECT * FROM applicationusers WHERE email = :email", [
            ":email" => $email,
        ])->find();

        if (password_verify($password, $user['pwd'])) {
            login([
                "email" => $email
            ]);

            return true;
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
    }
}
