<?php 

// Importação do autoload do composer
require_once __DIR__.'/../vendor/autoload.php';

// Importação dos pacotes necessários
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Criar uma configuração ORM do Doctrine
$isDevMode = true;
$configuration = Setup::createAnnotationMetadataConfiguration(
    [__DIR__.'/../src'], 
    $isDevMode
);

//Configuração do banco de dados utilizando MYSQL
$dbConf = [
    'driver'   => 'pdo_mysql',//Tipo do BD
    'user'     => 'root',//Usuário do BD
    'password' => '',//Senha do BD
    'dbname'   => 'crud',//Nome do BD
];

$entityManager = EntityManager::create($dbConf, $configuration);