<?php
namespace TrabajoSube;
//h0la

class Boleto{
    public $costo;
    public $saldo_restante;
    public $linea;

    public function __construct($costo, $saldo, $linea){
        $this->costo = $costo;
        $this->saldo_restante = $saldo;
        $this->linea = $linea;
    }
}