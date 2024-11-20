<?php 

require_once('Aposta.php');

class Dinheiro extends Aposta implements IApostar{
    private float $valor;

    public function getAposta()
    {
        $dados = "A aposta do tipo 'dinheiro' foi realizada no dia " . $this->getDataAposta();
        $dados .= " no valor de: " . $this->valor;
        $dados .= " no cavalo: " . $this->getCavalo()->getNomeCavalo() ."\n";

        return $dados;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}
