<?php
namespace TrabajoSube;

use Exception;
use PHPUnit\Event\Test\PassedSubscriber;

class Tarjeta
{
    private $saldo;
    private $limiteSaldo = 6600;

    private $minSaldo = -211.84;
    private $viajesPlus;

    public $tipoFranquicia;

    private $cargasPosibles = array(150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);

    public function __construct($saldoInicial = 0)
    {
        if ($saldoInicial < 0) {
            throw new Exception("El saldo inicial no puede ser negativo.");
        }
        $this->saldo = $saldoInicial;
        $this->viajesPlus = 2;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function verifyMonto($monto)
{
    if (($this->saldo + $monto) <= 6600 && in_array($monto, $this->cargasPosibles)) {
        echo "Exito";
        return true;
    } else {
        echo "No se puede cargar saldo";
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

    public function getMinSaldo()
    {
        return $this->minSaldo;
    }

    public function getViajesPlus()
    {
        return $this->viajesPlus;
    }

    public function usarViajePlus(){
        $this->viajesPlus--;
    }

}

class FranquiciaCompleta extends Tarjeta
{
    public function __construct($saldoInicial = 0)
    {
        parent::__construct($saldoInicial);
        $this->tipoFranquicia = 'completa';
    }
}

class MedioBoleto extends Tarjeta
{
    public function __construct($saldoInicial = 0)
    {
        parent::__construct($saldoInicial);
        $this->tipoFranquicia = 'parcial';
    }

    public function calcularCostoBoleto($costoNormal)
    {
        return $costoNormal / 2; // El costo del boleto es siempre la mitad del normal
    }
}

?>