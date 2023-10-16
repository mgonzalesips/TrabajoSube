<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function testConstruct(){
        $cole = new Colectivo(103, new Tiempo());
        $this->assertEquals($cole->linea, 103);
    }
    public function testGetlinea(){
        $cole = new Colectivo(103, new Tiempo());
        $this->assertEquals($cole->getLinea(), 103);
    }

    public function testPagarCon(){
        $tarjeta = new Tarjeta();
        $cole = new Colectivo(102, new Tiempo());
        $this->assertInstanceOf(Boleto::class, $cole->pagarCon($tarjeta, false));   
    }

    public function testPagarConMedio(){
        $tarjeta = new FranquiciaParcial();
        $tiempo = new TiempoFalso();
        $cole = new Colectivo(102, $tiempo);

        $tarjeta->cargarDinero(400);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, 400 - $cole->costo/2);
        $cole->tiempo->avanzar(50);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, 400 - $cole->costo/2);
    }
}