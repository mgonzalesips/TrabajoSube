<?php
namespace TrabajoSube;
class Tarjeta {
    private $saldo;
    private $limiteSaldo = 6600;

    public function __construct($saldoInicial = 0) {
        if ($saldoInicial < 0) {
            throw new Exception("El saldo inicial no puede ser negativo.");
        }
        $this->saldo = $saldoInicial;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function cargarSaldo($monto) {
        if ($monto > 0) {
            $this->saldo = min($this->saldo + $monto, $this->limiteSaldo);
            return true;
        }
        return false;
    }
}

?>