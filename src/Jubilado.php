<?php
namespace TrabajoSube;

class Jubilado extends Tarjeta {
    public $ultimoViaje = 0; // Guarda el timestamp del último viaje

    public function pagarPasaje() {
        // Verificamos el tiempo transcurrido desde el último viaje
        if ($this->tiempoDesdeUltimoViaje() < 300) { // 300 segundos = 5 minutos
            throw new \Exception("Debes esperar al menos 5 minutos antes de realizar otro viaje.");
        }

        // Realizamos el viaje y actualizamos el tiempo del último viaje
        $this->saldo -= 0;
        $this->actualizarTiempoUltimoViaje();
    }

    public function realizarViajePlus() {
        $this->saldo -= 120;
    }

    public function tiempoDesdeUltimoViaje() {
        return time() - $this->ultimoViaje;
    }

    public function actualizarTiempoUltimoViaje() {
        $this->ultimoViaje = time();
    }
}
