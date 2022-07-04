<?php

namespace CRUD\Controller;

use CRUD\Model\Contato;
use CRUD\Model\Pessoa;
use Exception;

class ControllerManutencaoContato extends ControllerPadrao
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
                header('Location: /contatos');
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
            $contato = $this->getEntityManager()->getRepository(Contato::class)->find($id);
        }
        $oEntityManager = $this->getEntityManager();
        $pessoas = $oEntityManager->getRepository(Pessoa::class)->findAll();
        $acao = $this->getAcao();
        $visualizar = $this->getAcao() == 'view';
        $alterar = $this->getAcao() == 'edit';
        $incluir = !$alterar && !$visualizar;
        require __DIR__ . '/../View/ViewManutencaoContato.php';
    }

    private function fetchDados(): void
    {
        switch ($this->getAcao()) {
            case 'edit':
                if (!($id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT))) {
                    header('Location: /contatos');
                    return;
                }

                $contato = $this->getEntityManager()->getRepository(Contato::class)->find($id);
                $contato->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS));
                $this->getEntityManager()->flush();
                break;
            case 'delete':
                if (!($id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))) {
                    header('Location: /contatos');
                    return;
                }
                $contato = $this->getEntityManager()->getReference(Contato::class, $id);
                $this->getEntityManager()->remove($contato);
                $this->getEntityManager()->flush();
                break;
            default:
                $contato = new Contato();
                $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!$descricao || $descricao == '') {
                    throw new Exception('Não foi informado uma descrição!');
                }
                $contato->setDescricao($descricao);
                $contato->setTipo(filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_NUMBER_INT));

                $pessoa = filter_input(INPUT_POST, 'pessoa', FILTER_SANITIZE_NUMBER_INT);
                $ModelPessoa = $this->getEntityManager()->getRepository(Pessoa::class)->find($pessoa);
                $contato->setPessoa($ModelPessoa);
                $this->getEntityManager()->persist($contato);
                $this->getEntityManager()->flush();
                break;
        }
    }
}
