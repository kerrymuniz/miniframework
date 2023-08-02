<?php

namespace MF\Init;

abstract class Bootstrap { // uma classe abstrata não pode ser instanciada, apenas herdada
    private $routes;

    abstract protected function initRoutes();

    public function __construct() {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
    }

    protected function run($url) {
        foreach ($this->getRoutes() as $key => $route) {
            if($url == $route['route']) {
                $class = "App\\Controllers\\".ucfirst($route['controller']);

                $controller = new $class;

                $action = $route['action'];

                $controller->$action();
            }
        }
    }

    protected function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // $_SERVER : retorna todos os detalhes do servidor da aplicação
                                                    // parse_url() : recebe uma url, interpreta-a e retorna seus componentes (array)
    }

}

?>