<?php

function routes() {
    return require 'routes.php';
}
function matchUriInRoutes($uri, $routes) {
    if(array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }
    return [];
}
function regularExpressionMatchUriInRoutes($uri, $routes) {
    return array_filter(
        array_keys($routes),
        function($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        }
    );
}
function router() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    $routes = routes();

    $matchedUri = matchUriInRoutes($uri, $routes);

    if(empty($matchedUri)) {
        $matchedUri = regularExpressionMatchUriInRoutes($uri, $routes);
    }

    var_dump($matchedUri);
    die();
}