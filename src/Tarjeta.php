<?php
namespace TrabajoSube;

use Exception;

class Tarjeta
{
    private $saldo;
    private $limiteSaldo = 6600;

    private $minSaldo = 211.84;

    private $cargasPosibles = array(150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);

    public function __construct($saldoInicial = 0)
    {
        if ($saldoInicial < 0) {
            throw new Exception("El saldo inicial no puede ser negativo.");
        }
        $this->saldo = $saldoInicial;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function verifyMonto($monto)
    {
        if (($this->saldo + $monto) <= 6600) {
            foreach ($this->cargasPosibles as $montosValidos) {
                if ($montosValidos == $monto) {
                    echo "Exito";
                    return true;
                }
            }
            return false;
        } else {
            echo "Supera el limite";
            return false;
        }
    }

    public function cargarSaldo($monto)
    {
        if ($this->verifyMonto($monto)) {
            $this->saldo += $monto;
        } else {
            echo "No se puede cargar saldo";
        }
    }

    public function descontarSaldo($montoDescontar)
    {
        $this->saldo -= $montoDescontar;
    }

}
?>