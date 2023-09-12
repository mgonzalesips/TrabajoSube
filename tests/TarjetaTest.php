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
    public function testCargarDinero($saldo, $carga, $expected)
    {
        $this->tarjeta->saldo = $saldo;
        $this->assertEquals($this->tarjeta->cargarDinero($carga), $expected);
    }
    
    public static function tarjetaProvider(){
        //Saldo, Carga, Saldo+Carga, Saldo-Boleto
        return [
            [1000, 4000, 5000, 880],
            [5000, 2000, -1, 4880],
            [6450, 150, 6600, 6330],
            'Caso limite carga' => [6600, 150, -1, 6480],
            'Caso limite pago' => [110, 150, 260, -1]
        ];
    }

}
?>