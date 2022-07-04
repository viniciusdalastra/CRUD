<?php

namespace CRUD\Controller;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class ControllerPadrao
{

    protected function getEntityManager($bNew = false)
    {
        static $EntityManager;
        if (!isset($EntityManager) || $bNew) {
            $configuration = Setup::createAnnotationMetadataConfiguration(
                [__DIR__ . '/../../src'],
                true
            );

            //Configuração do banco de dados utilizando MYSQL
            $dbConf = [
                'driver'   => 'pdo_mysql', //Tipo do BD
                'user'     => 'root', //Usuário do BD
                'password' => '', //Senha do BD
                'dbname'   => 'crud', //Nome do BD
            ];

            if ($bNew) {
                return EntityManager::create($dbConf, $configuration);
            }
            $EntityManager = EntityManager::create($dbConf, $configuration);
        }
        return $EntityManager;
    }

    public function processaDados()
    {
    }
}
