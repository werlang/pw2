<?php

namespace Source\Core;

class View {
    private $path;
    private $templates;

    public function __construct($path) {
        $this->path = $path;
        $this->templates = new \Mustache_Engine();
    }

    public function render($file, $vars) {
        echo $this->get($file, $vars);
    }

    public function get($file, $vars) {
        $file = file_get_contents(__DIR__ . "/../..{$this->path}/{$file}.html");
        return $this->templates->render($file, $vars);
    }
}