<?php
namespace TrabajoSube;

class Colectivo {
    public $linea;
    public $empresa;

    public function __construct($linea) {
        $this->linea = $linea;
    }

    public function pagarCon($tarjeta) {
        $tarjeta->pagarPasaje(120);
        return new Boleto($this, $tarjeta);
    }
}
?>
