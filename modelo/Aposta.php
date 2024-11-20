<?php 

require_once('Cavalos.php');
require_once('IApostar.php');

class Aposta {
    protected string $dataAposta;
    protected Cavalos $cavalo;

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
