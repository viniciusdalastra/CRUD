<?php

namespace CRUD\Controller;

use CRUD\Model\Contato;
use CRUD\Model\Pessoa;
use Exception;

class ControllerManutencaoPessoa extends ControllerPadrao
{

    private function getAcao()
    {
        return filter_input(INPUT_GET, 'aca', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    private function getProcesso()
    {
        return filter_input(INPUT_GET, 'proc', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function processaDados()
    {
        switch ($this->getProcesso()) {
            case 'fetch':
                $this->fetchDados();
                header('Location: /pessoas');
                break;
            default:
                $this->montaTela();
                break;
        }
    }

    public function montaTela(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id) {
            $pessoa = $this->getEntityManager()->getRepository(Pessoa::class)->find($id);
        }
        $acao = $this->getAcao();
        $visualizar = $this->getAcao() == 'view';
        $alterar = $this->getAcao() == 'edit';
        $incluir = !$alterar && !$visualizar;
        require __DIR__ . '/../View/ViewManutencaoPessoa.php';
    }

    private function fetchDados(): void
    {
        switch ($this->getAcao()) {
            case 'edit':
                if (!($id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT))) {
                    header('Location: /pessoas');
                    return;
                }
                $pessoa = $this->getEntityManager()->getRepository(Pessoa::class)->find($id);
                $pessoa->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
                $pessoa->setCpf(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS));
                $this->getEntityManager()->flush();
                break;
            case 'delete':
                if (!($id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))) {
                    header('Location: /pessoas');
                    return;
                }

                $pessoa = $this->getEntityManager()->getReference(Pessoa::class, $id);
                $this->getEntityManager()->remove($pessoa);
                $this->getEntityManager()->flush();
                break;
            default:
                $pessoa = new Pessoa();
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!$nome || $nome == '') {
                    throw new Exception("Nome não inserido", 1);
                }
                $pessoa->setNome($nome);
                $pessoa->setCpf(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS));
                $this->getEntityManager()->persist($pessoa);
                $this->getEntityManager()->flush();
                break;
        }
    }
}
