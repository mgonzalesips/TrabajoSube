<?php
namespace TrabajoSube;

class Tarjeta {
    public $saldo;

    const TARIFA = 120;
    const CARGAS_VALIDAS = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];
    const LIMITE_SALDO = 6600;

    public function __construct() {
        $this->saldo = 0;
        $this->montoPagado = 0;
    }

    public function cargarSaldo($monto) {
        if (in_array($monto, self::CARGAS_VALIDAS)) {
            $this->saldo += $monto;
            if ($this->saldo > self::LIMITE_SALDO) {
                $this->saldo = self::LIMITE_SALDO;
            }
            return true;
        }   
        return false;
    }

    public function pagarPasaje() {
        /*if ($this->saldo >= self::TARIFA) {
            $this->saldo -= self::TARIFA;
            $this->montoPagado = self::TARIFA;
            return true;
        }else {
            $this->realizarViajePlus();
        }*/
        $this->montoPagado += self::TARIFA;
        $this->saldo -= self::TARIFA;
    }

    public function getMontoPagado() {
        return $this->montoPagado;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function realizarViajePlus() {
        /*if ($this->saldo <= 120) {
            if(($this->saldo - 120) >= (-240)){
                $this->saldo -= 120;
            }
            else {
                throw new \Exception("Saldo insuficiente para realizar un viaje plus.");
            }
        }*/
        $this->saldo -= self::TARIFA;
    }

}
/*
$tarjeberp = new Tarjeta();

$montoCarga = 200; 
$resultadoCarga = $tarjeberp->cargarSaldo($montoCarga);

if ($resultadoCarga) {
    echo "\n Saldo cargado exitosamente. Nuevo saldo: $" . $tarjeberp->getSaldo();
} else {
    echo "\n Error al cargar saldo. Monto no válido.";
}

$tarjeberp->pagarPasaje();
echo "\n el saldo es: $" . $tarjeberp->getSaldo();
echo "\n el monto pagado es: $" . $tarjeberp->getMontoPagado();
*/
?>


