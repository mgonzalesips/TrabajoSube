<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    public function testInicializacion()
    {
        $tarjeta = new Tarjeta();

        $this->assertEquals(0, $tarjeta->saldo);
        $this->assertEquals(~211.84, $tarjeta->minsaldo);
        $this->assertEquals(6600, $tarjeta->maxsaldo);
    }

    public function testCargarDinero(){
        $tarjeta = new Tarjeta();

        $tarjeta->cargarDinero(4000);
        $tarjeta->cargarDinero(3000);
        $this->assertEquals(6600, $tarjeta->saldo);
        $this->assertEquals(400, $tarjeta->excedente);
    
    }
   
}
?>