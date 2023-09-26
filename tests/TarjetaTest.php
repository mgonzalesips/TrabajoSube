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
        //Saldo, Carga, Saldo+Carga
        return [
            [1000, 4000, 5000],
            [5000, 2000, false],
            [6450, 150, 6600],
            'Caso limite carga' => [6600, 150, false],
            'Caso limite pago' => [110, 150, 260]
        ];
    }

}
?>