<?php
namespace TrabajoSube;

class Colectivo {
    public $linea;
    public $empresa;

    public function __construct($linea) {
        $this->linea = $linea;
    }

    public function pagarCon($tarjeta,$fecha) {
        //$fecha = '24.11.23';
        //$tarjeta->pagarPasaje(120);
        //return new Boleto($this, $tarjeta, $fecha);
        if ($tarjeta->saldo >= $tarjeta::TARIFA) {
            $tarjeta->pagarPasaje();
            //return true;
            return new Boleto($this,$tarjeta,$fecha);
        }else {
            //$tarjeta->realizarViajePlus();
            if ($tarjeta->saldo <= $tarjeta::TARIFA) {
                if(($tarjeta->saldo - $tarjeta::TARIFA) >= (-240)){
                    $tarjeta->realizarViajePlus();
                    return new Boleto($this,$tarjeta,$fecha);
                }
                else {
                    throw new \Exception("Saldo insuficiente para realizar un viaje plus.");
                }
            }
        
        }
    }

    public function getLinea() {
        return $this->linea;
    }
}
?>
