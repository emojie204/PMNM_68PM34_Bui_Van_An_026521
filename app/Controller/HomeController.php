<?php
class HomeController 
{
    public function index()
    {
        $username = $_SESSION['username'] ?? 'Khách';
        $title = 'Trang chủ';

        ob_start();
        require __DIR__ . '/../View/home/index.php';
        $content = ob_get_clean();

        require __DIR__ . '/../View/layout/masterlayout.php';
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
