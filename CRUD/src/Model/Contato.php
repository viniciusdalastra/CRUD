<?php 

namespace CRUD\Model;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @Entity @Table(name="tbcontato")
 */
class Contato
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $descricao;

    /**
     * @Column(type="boolean")
     */
    protected $tipo;

    /**
     * @ManyToOne(targetEntity="Pessoa", cascade={"remove"})
     * @JoinColumn(name="pessoa_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $pessoa;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa)
    {
        return $this->Pessoa = $pessoa;
    }
}