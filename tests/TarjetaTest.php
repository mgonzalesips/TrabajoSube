<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testGetSaldo(){
        $tarj = new Tarjeta();
        $this->assertEquals($tarj->getSaldo(), 0);
    }
}