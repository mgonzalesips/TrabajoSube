<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function testGetlinea(){
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
    }

    public function testPagarCon(){
        $tarjeta = new Tarjeta();
        $cole = new Colectivo(102);
        $this->assertInstanceOf(Boleto::class, $cole->pagarCon($tarjeta));
    }

}