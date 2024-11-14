<?php 

require_once('Cavalos.php');
require_once('IApostar.php');

class Aposta implements IApostar{
    protected string $dataAposta;
    protected Cavalos $cavalo;

    //metodos

    public function getAposta()
    {
        
    }
    
    public function getResultado()
    {
        
    }

    //gets and sets

    public function getDataAposta(): string
    {
        return $this->dataAposta;
    }

    public function setDataAposta(string $dataAposta): self
    {
        $this->dataAposta = $dataAposta;

        return $this;
    }

    public function getCavalo(): Cavalos
    {
        return $this->cavalo;
    }

    public function setCavalo(Cavalos $cavalo): self
    {
        $this->cavalo = $cavalo;

        return $this;
    }
}
