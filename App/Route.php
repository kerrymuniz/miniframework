<?php

    namespace App;

    class Route {

        public function initRoutes() {

            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            );

            $routes['sobre_nos'] = array(
                'route' => 'sobre_nos',
                'controller' => 'indexController',
                'action' => 'sobreNos'
            );

        }

        public function getUrl() {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // $_SERVER : retorna todos os detalhes do servidor da aplicação
                                                        // parse_url() : recebe uma url, interpreta-a e retorna seus componentes (array)
        }

    }

?>