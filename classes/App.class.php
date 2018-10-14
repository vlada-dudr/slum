<?php
class App {
    private static $instance = null;

    private function renderTexts() {
        echo "uhh";
    }

    private function __construct() {
        $this->renderTexts();
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new App();
        }

        return self::$instance;
    }
}