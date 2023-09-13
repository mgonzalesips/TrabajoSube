<?php
namespace TrabajoSube;

class Tarjeta {
    private float $saldo;
    private int $limite_saldo = 6600;
    private int $id;
    private string $tipo;
    private float $deuda_plus;
    private array $montos_validos = array(150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);

    public function __construct() {
        $this->id = 0;
        $this->saldo = 0;
        $this->tipo = "Normal";
        $this->deuda_plus = 0;
    }

    public function obtenerSaldo(): float {
        return $this->saldo;
    }

    public function obtenerId(): float {
        return $this->id;
    }

    public function actualizarDeuda($deuda) {
        $this->deuda_plus += $deuda;
    }

    public function reiniciarDeuda() {
        $this->deuda_plus = 0;
    }

    public function obtenerDeuda(): float {
        return $this->deuda_plus;
    }

    public function obtenerTipo(): string {
        return $this->tipo;
    }

    public function cargarSaldo(float $monto): bool {
        $saldo_anterior = $this->saldo;
        
        if (in_array($monto, $this->montos_validos)) {
            if ($this->saldo + $monto <= $this->limite_saldo) {
                $this->actualizarSaldo($monto + $deuda_plus);
            } 
        } 

        return $saldo_anterior != $this->saldo;
    }

    public function actualizarSaldo(float $monto) {
        $this->saldo += $monto;
    }

    public function pagarViaje(float $tarifa){
        $this->actualizarSaldo(-$tarifa);
    }
}