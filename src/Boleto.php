<?php
namespace TrabajoSube;

class Boleto {
    public $colectivo;
    public $tarjeta;
    public $fecha;

    public function __construct($colectivo,$tarjeta,$fecha) {
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        $this->fecha = $fecha;
    }

    public function getColectivo(){
        return $this->colectivo;
    }

    public function getTarjeta(){
        return $this->tarjeta;
    }

    public function getFecha(){
        return $this->fecha;
    }

    /*public function obtenerInfo() {
        return "Fecha: " . $this->fecha . "\n" .
               "Colectivo: Línea " . $this->colectivo->getLinea() . ", Empresa: " . $this->colectivo->getEmpresa() . "\n" .
               "Monto pagado: $" . $this->tarjeta->getMontoPagado();
    }*/
}
?>

