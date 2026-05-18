<?php

class App
{
    protected $controller = 'home';
    protected $action     = 'index';
    protected $params     = [];

    public function __construct()
    {
        // Lấy URL từ query string ?url=...
        if (isset($_GET['url'])) {
            // Làm sạch URL: xóa / thừa đầu/cuối, chuyển thường
            $url = trim($_GET['url'], '/');
            $url = strtolower($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Tách URL thành mảng theo dấu /
            // Ví dụ: "products/detail/5" → ['products', 'detail', '5']
            $urlProcessed = explode('/', $url);

            // --- Xác định Controller ---
            if (isset($urlProcessed[0]) && $urlProcessed[0] !== '') {
                $controllerFile = '../app/controllers/'
                    . ucfirst($urlProcessed[0])
                    . 'Controller.php';

                if (file_exists($controllerFile)) {
                    $this->controller = ucfirst($urlProcessed[0]) . 'Controller';
                    var_dump($urlProcessed);
                    unset($urlProcessed[0]);
                } else {
                    // Controller không tồn tại → load trang 404

                    var_dump($urlProcessed);

                    $this->controller = '404';
                    $this->loadView('404');
                    return;
                }
            }

            // --- Xác định Action (method) ---
            // Reset lại index mảng sau unset
            $urlProcessed = array_values($urlProcessed);

            if (isset($urlProcessed[0]) && $urlProcessed[0] !== '') {
                // Kiểm tra method có tồn tại trong controller không
                if (method_exists($this->controller, $urlProcessed[0])) {
                    $this->action = $urlProcessed[0];
                    unset($urlProcessed[0]);
                } else {
                    // Method không tồn tại → load trang 404
                    $this->loadView('404');
                    return;
                }
            }

            // --- Lấy các tham số còn lại ---
            // Ví dụ: URL "products/detail/5/color/red" → params = ['5', 'color', 'red']
            $urlProcessed = array_values($urlProcessed);
            $this->params = $urlProcessed ?? [];
        }

        // --- Load Controller và gọi Action ---
        $controllerFile = '../app/controllers/' . $this->controller . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Khởi tạo controller
            $controller = new $this->controller();

            // Gọi action với các tham số
            if (method_exists($controller, $this->action)) {
                call_user_func_array([$controller, $this->action], $this->params);
            } else {
                $this->loadView('404');
            }
        } else {
            $this->loadView('404');
        }
    }

    // --- Helper: Load view trực tiếp (dùng cho 404, lỗi, v.v.) ---
    private function loadView($view)
    {
        $viewFile = '../app/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            http_response_code(404);
            echo "<h1>404 - Trang không tồn tại</h1>";
        }
    }
}
