<?php
namespace TrabajoSube;
use Exception;


class Boleto
{
    private $tarifa;
    private $saldoRestante;
    public function __construct($saldoInicial, $tarifa) {
        $this->saldoRestante = $saldoInicial - $tarifa;
        $this->tarifa = $tarifa;
    }
    public function getTarifa()
    {
        return $this->tarifa;
    }

    public function getSaldoRestante()
    {
        return $this->saldoRestante;
    }

    
}



?>