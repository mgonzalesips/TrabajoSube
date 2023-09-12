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
        return $this->linea;
    }

    public function pagarCon($tarjeta){
        $nuevosaldo = $tarjeta->saldo - $this->costo;
        if ($tarjeta->saldo >= ~$this->costo && $nuevosaldo >= $tarjeta->minsaldo ){
            $tarjeta->saldo = $nuevosaldo;
            echo "Saldo restante: " + $tarjeta->saldo;
            return new Boleto($this->costo, $tarjeta->saldo, $this->linea);
        }
        else{
            echo "Saldo insuficiente"; 
            return false;
        }
    }

}
