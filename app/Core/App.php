<?php

class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $urlProcess = $this->urlProcess();
        // var_dump($urlProcess);
        // Xử lý controller
        if (file_exists("../app/Controller/" . $urlProcess[0] . ".php")) {
            $this->controller = $urlProcess[0];
            unset($urlProcess[0]);
        }
        var_dump($this->controller);

        require_once "../app/Controller/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // Xử lý method
        if (isset($urlProcess[1]) && method_exists($this->controller, $urlProcess[1])) {
            $this->method = $urlProcess[1];
            unset($urlProcess[1]);
        }

        // Xử lý params
        $this->params = $urlProcess ? array_values($urlProcess) : [];

        // Gọi controller và method với params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function urlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
