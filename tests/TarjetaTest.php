<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;


class TarjetaTest extends TestCase {

    public $tarjeta = null;

    public function setUp(): void
    {
        $this->tarjeta = new Tarjeta();
    }

    /**
     * @dataProvider tarjetaProvider
     */

    public function testPagarBoleto($saldoini, $carga, $expected) 
    {
        $this->tarjeta->saldo = $saldoini;
        $costoBoleto = 120;
        $this->assertEquals($saldoini-$costoBoleto, $this->tarjeta->pagarBoleto($costoBoleto));
    }

    /**
     * @dataProvider tarjetaProvider
     */
    public function testCargarDinero($saldo, $carga, $expected)
    {
        $this->tarjeta->saldo = $saldo;
        $this->assertEquals($this->tarjeta->cargarDinero($carga), $expected);
    }
    
    public static function tarjetaProvider(){
        return [
            [1000, 4000, 5000],
            [5000, 2000, -1],
            [6450, 150, 6600],
            'Caso Limite' => [6600, 150, -1]
        ];
    }

}
?>