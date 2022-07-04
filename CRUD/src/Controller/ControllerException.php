<?php

namespace CRUD\Controller;

class ControllerException extends ControllerPadrao
{

    private $exception;

    public function getException()
    {
        return $this->exception;
    }

    public function setException($exception)
    {
        $this->exception = $exception;
    }

    public function processaDados()
    {
        $mensagem = $this->getException()->getMessage().'</br>' .$this->getException()->getTrace();
        require __DIR__ . '/../View/ViewException.php';
    }
}
