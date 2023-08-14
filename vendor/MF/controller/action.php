<?php

namespace MF\Controller;

abstract class Action {
    
    protected $view;

    public function __construct() {
        $this->view = new \stdClass(); //stdClass() é uma classe nativa do php que permite criar objetos padrões;
    }

    protected function render($view, $layout) {
        $this->view->page = $view;

        if(file_exists("../App/views/".$layout.".phtml")) {
            require_once "../App/views/".$layout.".phtml";
        } else {
            $this->content();
        }
    }

    protected function content() {
        $classAtual = get_class($this);

        $classAtual = str_replace('App\\Controllers\\', '', $classAtual);

        $classAtual = str_replace('Controller', '', $classAtual);

        require_once "../App/views/".$classAtual."/".$this->view->page.".phtml";
    }
}

?>