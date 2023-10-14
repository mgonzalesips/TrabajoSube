<?php
namespace TrabajoSube;

class Colectivo {
    public $linea;
    const TARIFA = 120; // Definimos la tarifa como constante

    public function __construct($linea) {
        $this->linea = $linea;
    }

    
    public function pagarCon($tarjeta, $fecha) {
        if ($tarjeta->getSaldo() >= self::TARIFA) {
            // Verificamos el tiempo transcurrido desde el último viaje
            if ($tarjeta instanceof MedioBoleto && $tarjeta->tiempoDesdeUltimoViaje() < 300) {
                throw new \Exception("Debes esperar al menos 5 minutos antes de realizar otro viaje.");
            }

            // Realizamos el viaje y actualizamos el tiempo del último viaje
            $tarjeta->pagarPasaje(self::TARIFA);
            $tarjeta->actualizarTiempoUltimoViaje();

            return new Boleto($this, $tarjeta, $fecha, self::TARIFA, $tarjeta->getSaldo());
        } else {
            if ($tarjeta->getSaldo() <= self::TARIFA) {
                if (($tarjeta->getSaldo() - self::TARIFA) >= (-240)) {
                    $tarjeta->realizarViajePlus();
                    return new Boleto($this, $tarjeta, $fecha, self::TARIFA, $tarjeta->getSaldo());
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
