<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function testpagarCon(){
        $cole = new Colectivo();
        $tarj = new Tarjeta(200);
        $this->assertEquals($cole->pagarCon($tarj),80);
    }

    public function testcargaTarjeta(){
        $tarj = new Tarjeta(0);
        $carga = 500;
        $this->assertEquals($tarj->cargaTarjeta($tarj,$carga),500);
    }

}
