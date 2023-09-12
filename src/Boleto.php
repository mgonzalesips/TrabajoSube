<?php
namespace TrabajoSube;

class Boleto {
    public $colectivo;
    public $tarjeta;
    public $fecha;

    public function __construct($colectivo, $tarjeta) {
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        $this->fecha = date("Y-m-d H:i:s");
    }

    public function obtenerColectivo(){
        return $this->colectivo;
    }

    public function obtenerTarjeta(){
        return $this->tarjeta;
    }

    public function obtenerFecha(){
        return $this->fecha;
    }

    /*public function obtenerInfo() {
        return "Fecha: " . $this->fecha . "\n" .
               "Colectivo: Línea " . $this->colectivo->getLinea() . ", Empresa: " . $this->colectivo->getEmpresa() . "\n" .
               "Monto pagado: $" . $this->tarjeta->getMontoPagado();
    }*/
}
?>

