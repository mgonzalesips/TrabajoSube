<?php
namespace TrabajoSube;

use Exception;
use TrabajoSube\Boleto;
use TrabajoSube\Tarjeta;

class Colectivo
{
    private $tarifa = 180;

    private $saldoMinimo = -211.84;

    public function pagarCon(Tarjeta $tarjeta)
    {
        if($tarjeta->getSaldo() - $this->tarifa >= $this->saldoMinimo){
            $tarjeta->descontarSaldo($this->tarifa);
            return new Boleto($tarjeta->getSaldo(), $this->tarifa);
        }else{
            return false;
        }
    }
}
?>