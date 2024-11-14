<?php 

require_once('Aposta.php');

class Dinheiro extends Aposta{
    private float $valor;

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
