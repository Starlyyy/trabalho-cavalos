<?php 

require_once('Aposta.php');

class Bem extends Aposta{
    private string $tipoBem;
    private int $qualidade;


    public function getTipoBem(): string
    {
        return $this->tipoBem;
    }

    public function setTipoBem(string $tipoBem): self
    {
        $this->tipoBem = $tipoBem;

        return $this;
    }

    public function getQualidade(): int
    {
        return $this->qualidade;
    }

    public function setQualidade(int $qualidade): self
    {
        $this->qualidade = $qualidade;

        return $this;
    }
}
