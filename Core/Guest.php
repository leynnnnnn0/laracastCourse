<?php

class Guest
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            header('location: /laracast/');
            exit();
        }
    }
}
