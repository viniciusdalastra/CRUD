<?php

namespace CRUD\Controller;

use CRUD\Model\Contato;

class ControllerConsultaContato extends ControllerPadrao{

    public function processaDados()
    {
        $oEntityManager = $this->getEntityManager();
        $contatos = $oEntityManager->getRepository(Contato::class)->findAll();
        require __DIR__ . '/../View/ViewConsultaContato.php';
    }
}