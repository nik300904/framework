<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function myAutoLoader(string $className)
{
    require_once '../' . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('myAutoLoader');

$author = new src\Models\Users\User('Иван');
$article = new src\Models\Articles\Article('Заголовок', 'Текст', $author);

$route = $_GET['route'] ?? '';

$routes = require '../src/routes.php';

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);

    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
//var_dump($routes);
//$controller = new src\Controllers\MainController();

//var_dump($article);

//if (!empty($_GET['name'])) {
//    $controller->sayHello($_GET['name']);
//} else {
//    $controller->main();
//}

//$route = $_GET['route'] ?? '';
//$pattern = '~^hello/(.*)$~';
//
//preg_match($pattern, $route, $matches);
////var_dump($matches);
//
//if (!empty($matches)) {
//    $controller = new src\Controllers\MainController();
//    $controller->sayHello($matches[1]);
//
//    return;
//}
//
//$pattern = '~^$~';
//
//preg_match($pattern, $route, $matches);
//
//if (!empty($matches)) {
//    $controller = new src\Controllers\MainController();
//    $controller->main();
//    return;
//
//}
//
//echo "Страница не найдена!";