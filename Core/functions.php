<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

// rounded-md bg-gray-900 text-white
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
};

function abort($code = 404)
{
    http_response_code($code);
    require_once 'views/' . $code . '.php';
    die();
}

function authorize(bool $condition, $status = RESPONSE::FORBIDDEN)
{
    if ($condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require_once base_path('views/' . $path);
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID','', time() - 3600, $params['path'], $params['domain']);

}
