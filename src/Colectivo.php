<?php
namespace TrabajoSube;

use function PHPUnit\Framework\assertInstanceOf;

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
        if(is_a($tarjeta, "FranquiciaParcial")){
            $nuevosaldo = $tarjeta->saldo - $this->costo/2;
        }
        if(is_a($tarjeta, "FranquiciaTotal")){
            $nuevosaldo = $tarjeta->saldo;   
        }
        else{
            $nuevosaldo = $tarjeta->saldo - $this->costo;
        }
        
        if ($nuevosaldo >= $tarjeta->minsaldo){
            $tarjeta->saldo = $nuevosaldo;
            return new Boleto($this->costo, $tarjeta->saldo, $this->linea, $tarjeta->id, time(), get_class($tarjeta));
        }
        else{
            echo "Saldo insuficiente\n"; 
            return false;
        }
    }

}
