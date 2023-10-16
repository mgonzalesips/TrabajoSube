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
        $this->assertInstanceOf(Boleto::class, $cole->pagarCon($tarjeta));   
    }

    public function testPagarConMedio(){
        $tarjeta = new FranquiciaParcial();
        $tiempo = new TiempoFalso();
        $cole = new Colectivo(102, $tiempo);
        
        $saldoini = 1000;
        $tarjeta->cargarDinero($saldoini);
        
        //Primer pago (aceptado)
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo/2);
        
        //Segundo pago (rechazado) - No pasaron los 5 minutos
        $cole->tiempo->avanzar(50);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo/2);
        
        //Tercer pago (aceptado)
        $cole->tiempo->avanzar(300);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo/2*2);
        
        //Cuarto pago (aceptado)
        $cole->tiempo->avanzar(300);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo/2*3);
        
        //Quinto pago (aceptado)
        $cole->tiempo->avanzar(300);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo/2*4);
        
        //Sexto pago (rechazado) - No hay más boletos
        $cole->tiempo->avanzar(300);
        $cole->pagarCon($tarjeta, true);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo/2*4);
    }

    public function testPagarConCompleto(){
        $tarjeta = new FranquiciaCompleta();
        $cole = new Colectivo(102, new TiempoFalso());

        $saldoini = 1000;
        $tarjeta->cargarDinero($saldoini);

        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->saldo, $saldoini);
    
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->saldo, $saldoini);

        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo);
        
        //Pasan 24 horas y se renuevan la cantidad de boletos
        $cole->tiempo->avanzar(60*60*24);

        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->saldo, $saldoini - $cole->costo);
    }

}