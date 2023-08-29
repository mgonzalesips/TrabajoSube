<?php
namespace TrabajoSube;

class Colectivo {
    public $linea;
    public $empresa;

    public function __construct($linea, $empresa) {
        $this->linea = $linea;
        $this->empresa = $empresa;
    }

    public function pagarCon($tarjeta) {
        $tarjeta->pagarPasaje(120);
        return new Boleto($this, $tarjeta);
    }
}
?>
