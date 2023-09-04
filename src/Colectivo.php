<?php
namespace TrabajoSube;

include "Boleto.php";
include "Tarjeta.php";

class Colectivo{
    public $linea;
    public $costo = 120;

    public function __construct($linea){
        $this->linea = $linea;
    }

    public function getLinea(){
        $this->linea;
    }

    public function pagarCon($tarjeta){
        $tarjeta->pagarBoleto($this->costo);
        return $boleto = new Boleto($this->costo, $tarjeta->saldo, $this->linea);
    }
}
