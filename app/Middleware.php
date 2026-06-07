<?php

class Middleware
{
    public function checklogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $guest_only_pages = [
            'HomeController/login',
            'AuthController/login',
        ];

        $currentUrl = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

        if (isset($_SESSION['username']) && in_array($currentUrl, $guest_only_pages, true)) {
            header('Location: /HomeController/index');
            exit();
        }

        if (!isset($_SESSION['username']) && !in_array($currentUrl, $guest_only_pages, true)) {
            header('Location: /HomeController/login');
            exit();
        }
    }
}
