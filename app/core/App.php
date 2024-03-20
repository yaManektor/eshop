<?php
class App
{
    private $controller = 'HomeController';
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        // Відслідковування Url-адреси
        $url = $this->parseUrl();

        // Вибір контролера
        if (isset($url[0])) {
            if (file_exists('app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
                $this->controller = ucfirst($url[0]) . 'Controller';
                unset($url[0]);
            } else {
                header('Location: /public/error/404.php');
                exit();
            }
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        // Вибір методу
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Передача параметрів методу
        if ($url) {
            $method = new ReflectionMethod($this->controller, $this->method);
            $param_num = $method->getNumberOfParameters();

            if ($param_num != 0) {
                $this->params = array_values($url);
            } else {
                header('Location: /public/error/404.php');
                exit();
            }
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url']))
            return explode('/', htmlspecialchars(rtrim($_GET['url'], '/')));
    }
}
