<?php

namespace Source\Controller;

class Web {
    private $view;

    public function __construct($path) {
        $this->view = new \Source\Core\View('/Source/View');
    }

    public function home() {
        $this->view->render('index', []);
    }

}