<?php

namespace MF\Init;

abstract class Bootstrap {
    //uma classe abstrata não pode ser instanciada, somente herdada;
    
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
        //echo '-------------'.$url.'-------------';
        foreach($this->getRoutes() as $key => $route) {
            //print_r($route);
            //echo '<br><br><br><br>';
            
            
            if($url == $route['route']) {
                $class = "App\\Controllers\\".$route['controller'];
                
                $controller = new $class;
                
                $action = $route['action'];
                
                $controller->$action();
            }
        }
    }

    protected function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // a função parse_url recebe uma url, interpreta-a e retorna seus componentes(em array);
    }
}

?>