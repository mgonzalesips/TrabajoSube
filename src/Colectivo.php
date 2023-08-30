<?php
namespace TrabajoSube;
use Exception;
use TrabajoSube\Boleto;

class Colectivo
{
    private $tarifa = 120;
    
    public function cambiarTarifa($valor){
        $this->tarifa = $valor;
    }

    public function pagarCon(Tarjeta $tarjeta)
    {
        $saldoAnterior = $tarjeta->getSaldo();
        if ($saldoAnterior >= $this->tarifa) {
            $tarjeta->descontarSaldo($this->tarifa);
            return new Boleto($saldoAnterior, $this->tarifa);
        } else {
            throw new Exception("Saldo insuficiente para pagar el pasaje.");
        }
    }
}

?>