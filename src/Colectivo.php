<?php
namespace TrabajoSube;

class Colectivo {
    public $linea;
    public $empresa;
    const TARIFA = 120; // Definimos la tarifa como constante

    public function __construct($linea) {
        $this->linea = $linea;
    }

    public function pagarCon($tarjeta, $fecha) {
        if ($tarjeta->getSaldo() >= self::TARIFA) {
            $tarjeta->pagarPasaje(self::TARIFA); // Usamos la constante de tarifa

            return new Boleto($this, $tarjeta, $fecha);
        } else {
            if ($tarjeta->getSaldo() <= self::TARIFA) {
                if (($tarjeta->getSaldo() - self::TARIFA) >= (-240)) {
                    $tarjeta->realizarViajePlus();
                    return new Boleto($this, $tarjeta, $fecha);
                } else {
                    throw new \Exception("Saldo insuficiente para realizar un viaje plus.");
                }
            }
        }
    }

    public function getLinea() {
        return $this->linea;
    }
}
