<?php
namespace TrabajoSube;

class MedioBoleto extends Tarjeta {
    public $mitadTarifa;
    public $ultimoViaje = 0; // Guarda el timestamp del último viaje
    public $listaViajes = [];

    public function __construct() {
        parent::__construct(); // utiliza el constructor del padre
        $this->mitadTarifa = self::TARIFA / 2;
    }

    public function pagarPasaje() {
        // Verificamos el tiempo transcurrido desde el último viaje
        if ($this->tiempoDesdeUltimoViaje() < 300) { // 300 segundos = 5 minutos
            throw new \Exception("Debes esperar al menos 5 minutos antes de realizar otro viaje.");
        } else {
            $hoy = new \DateTime();

            if (count($this->listaViajes) === 0 || $this->listaViajes[0]->format('Y-m-d') !== $hoy->format('Y-m-d') ) {
                // Si es el primer viaje del día, reiniciar la lista de viajes
                $this->listaViajes = [new \DateTime()];
                $this->saldo -= $this->mitadTarifa;
                $this->actualizarTiempoUltimoViaje();
            } elseif (count($this->listaViajes) < 4){
                $this->saldo -= $this->mitadTarifa;
                $this->actualizarTiempoUltimoViaje();
                $this->listaViajes[] = new \DateTime();
            } else {
                $this->saldo -= self::TARIFA;
                $this->actualizarTiempoUltimoViaje();
                $this->listaViajes[] = new \DateTime();
            }
        }
    }

    public function realizarViajePlus() {
        $this->saldo -= self::TARIFA;
    }

    public function tiempoDesdeUltimoViaje() {
        return time() - $this->ultimoViaje;
    }

    public function actualizarTiempoUltimoViaje() {
        $this->ultimoViaje = time();
    }
}

