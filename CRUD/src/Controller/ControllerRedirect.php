<?php

namespace CRUD\Controller;

use Exception;

class ControllerRedirect extends ControllerPadrao{

    public function processaDados(){
        require __DIR__ . '/../View/ViewRedirect.php';
    }
}