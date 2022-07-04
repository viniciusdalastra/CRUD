<?php

namespace CRUD\Controller;

use CRUD\Model\Pessoa;

class ControllerConsultaPessoa extends ControllerPadrao{

    public function processaDados()
    {
        if(isset($_REQUEST['filter']) && $_REQUEST['filter'] == true && isset($_REQUEST['nome']) && $_REQUEST['nome'] != ''){
            $oEntityManager = $this->getEntityManager();
            $pessoas = $oEntityManager->getRepository(Pessoa::class)->findBy(['nome'=>$_REQUEST['nome']]);
        }
        else{
            $oEntityManager = $this->getEntityManager();
            $pessoas = $oEntityManager->getRepository(Pessoa::class)->findAll();
        }
        
        require __DIR__ . '/../View/ViewConsultaPessoa.php';
    }
}