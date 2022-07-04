<?php
require_once __DIR__ . '/../vendor/autoload.php';
error_reporting(0);
function getControllerByRoute($route){
    switch ($route) {
        case '/pessoas':
            return new CRUD\Controller\ControllerConsultaPessoa();
        case '/pessoa':
            return new CRUD\Controller\ControllerManutencaoPessoa();
        case '/contatos':
            return new CRUD\Controller\ControllerConsultaContato();
        case '/contato':
            return new CRUD\Controller\ControllerManutencaoContato();
        default:
            return new CRUD\Controller\ControllerRedirect();
    }
}

function getControllerException(){
    return new CRUD\Controller\ControllerException();
}
try {
    getControllerByRoute($_SERVER['PATH_INFO'])->processaDados();
} catch (\Exception $exception) {
    $controller = getControllerException();
    $controller->setException($exception);
    $controller->processaDados();
}