<?php

namespace MuslimahGuide\app;

class view
{
    public static function render(string $view, array $params = []){
        extract($params);

        require __DIR__ . '/../view/header.php';
        require __DIR__ . '/../view/' . $view . '.php';
        require __DIR__ . '/../view/footer.php';

    }

    public static function redirect(string $url){
        header("Location: $url");
        if (getenv("mode") != "test"){
            exit();
        }
    }
}