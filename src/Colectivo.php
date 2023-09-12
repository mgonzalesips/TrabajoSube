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
        $tarjeta->pagarPasaje(120);
        return new Boleto($this, $tarjeta, $fecha);
    }

    public function getLinea() {
        return $this->linea;
    }
}
?>
