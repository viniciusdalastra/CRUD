<?php 

namespace CRUD\Model;

/**
 * @Entity @Table(name="tbpessoa")
 */
class Pessoa 
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $nome;

    /**
     * @Column(type="string")
     */
    protected $cpf;

    public function setId()
    {
        return $this->id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
}