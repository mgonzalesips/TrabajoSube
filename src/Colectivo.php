<?php
namespace TrabajoSube;

class Colectivo
{
    private $tarifa = 120;

    public function pagarCon(Tarjeta $tarjeta)
    {
        $saldoAnterior = $tarjeta->getSaldo();
        if ($saldoAnterior >= $this->tarifa) {
            $tarjeta->cargarSaldo(-$this->tarifa);
            return new Boleto($this->tarifa, $saldoAnterior - $this->tarifa);
        } else {
            throw new Exception("Saldo insuficiente para pagar el pasaje.");
        }
    }
}

?>