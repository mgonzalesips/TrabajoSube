<?php
namespace TrabajoSube;

use Exception;
use TrabajoSube\Boleto;
use TrabajoSube\Tarjeta;

class Colectivo
{
    private $tarifa = 185;

    public function pagarCon(Tarjeta $tarjeta)
    {
        $costoNormal = $this->tarifa;

        // Verificar si la tarjeta es de tipo MedioBoleto y ajustar el costo del boleto
        if ($tarjeta instanceof MedioBoleto) {
            $costoNormal = $tarjeta->calcularCostoBoleto($costoNormal); // Si es MedioBoleto, el costo del boleto es la mitad
        }
        elseif($tarjeta instanceof FranquiciaCompleta){
            $costoNormal = 0;
        }

        if ($tarjeta->getSaldo() - $costoNormal >= $tarjeta->getMinSaldo()) {
            $tarjeta->descontarSaldo($costoNormal);
            return new Boleto($tarjeta->getSaldo(), $costoNormal);
        } else {
            return false;
        }
    }
}
?>