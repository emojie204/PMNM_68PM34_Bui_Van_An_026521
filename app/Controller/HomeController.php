<?php
class HomeController 
{
    public function index()
    {
        $username = $_SESSION['username'] ?? 'Khách';
        require_once __DIR__ . '/../View/home/index.php';
    }

    public function about()
    {
    echo "Đây là trang giới thiệu";
    }

    public function login()
    {
    require_once __DIR__ . '/../View/home/login.php';
    }
}
