<?php
function render(string $path, array $variables = []){

    extract($variables);
    ob_start();
    require('templates/'. $path . '_html.php');
    $pageContent = ob_get_clean();
    require 'templates/layout_html.php';
}

function redirect(string $url): void{
    header('Location: '. $url);
    exit();
}