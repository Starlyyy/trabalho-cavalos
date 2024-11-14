<?php 

class Cavalos {
    private int $numCavalo;
    private int $saudeCavalo;
    private string $nomeCavalo;

    public function __construct($n, $s, $nome)
    {
        $this->saudeCavalo = $s;
        $this->numCavalo = $n;
        $this->nomeCavalo = $nome;
    }


    public function getNumCavalo(): int
    {
        return $this->numCavalo;
    }

    public function setNumCavalo(int $numCavalo): self
    {
        $this->numCavalo = $numCavalo;

        return $this;
    }

    public function getSaudeCavalo(): int
    {
        return $this->saudeCavalo;
    }

    public function setSaudeCavalo(int $saudeCavalo): self
    {
        $this->saudeCavalo = $saudeCavalo;

        return $this;
    }

    public function getNomeCavalo(): string
    {
        return $this->nomeCavalo;
    }

    public function setNomeCavalo(string $nomeCavalo): self
    {
        $this->nomeCavalo = $nomeCavalo;

        return $this;
    }
}
