<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function testpagarCon(){
        $cole = new Colectivo();
        $tarj = new Tarjeta(200);
        $this->assertEquals($cole->pagarCon(tarj),80);
    }
}
