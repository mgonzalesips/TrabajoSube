<?php
namespace TrabajoSube;

class Boleto
{
    private $monto;
    private $saldoRestante;

    public function __construct($monto, $saldoRestante)
    {
        $this->monto = $monto;
        $this->saldoRestante = $saldoRestante;
    }

    public function getMonto()
    {
        return $this->monto;
    }

    public function getSaldoRestante()
    {
        return $this->saldoRestante;
    }
}



?>