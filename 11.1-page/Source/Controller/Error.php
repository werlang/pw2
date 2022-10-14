<?php

namespace Source\Controller;

class Error {
    public function e404() {
        include __DIR__ . "/../View/404.html";
    }
}