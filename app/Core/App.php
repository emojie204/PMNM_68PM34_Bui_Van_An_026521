<?php

class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        require_once __DIR__ . '/../Middleware.php';
        $middleware = new Middleware();
        $middleware->checklogin();

        $urlProcess = $this->urlProcess();

        if (isset($urlProcess[0]) && file_exists(__DIR__ . '/../Controller/' . $urlProcess[0] . '.php')) {
            $this->controller = $urlProcess[0];
            unset($urlProcess[0]);
        }

        require_once __DIR__ . '/../Controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($urlProcess[1]) && method_exists($this->controller, $urlProcess[1])) {
            $this->method = $urlProcess[1];
            unset($urlProcess[1]);
        }

        $this->params = $urlProcess ? array_values($urlProcess) : [];

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
