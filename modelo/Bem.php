<?php 

require_once('Aposta.php');

class Bem extends Aposta implements IApostar{
    private string $tipoBem;
    private int $qualidade;

    public function getAposta()
    {
        $dados = "A aposta do tipo 'bem' foi realizada no dia " . $this->getDataAposta();
        $dados .= " com o bem: " . $this->tipoBem;
        $dados .= " com qualidade:  " . $this->qualidade . "/10";
        $dados .= " no cavalo: ". $this->getCavalo()->getNomeCavalo() . "\n";

        return $dados;
    }

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
