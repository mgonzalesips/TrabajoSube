<?php
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaViajePlusTest extends TestCase {
    public function testDosViajesPlus() {
        $tarjeta = new Tarjeta();

        //pago 2 pasajes con saldo en 0 y verifico que ambos se pagan con el viaje plus

        $tarjeta->pagarPasaje();
        $this->assertEquals($tarjeta->getSaldo(), -120);
        $tarjeta->pagarPasaje();
        $this->assertEquals($tarjeta->getSaldo(), -240);
        
        //intento pagar el tercero con ya dos viajes plus en negativo y no me deja 

        $this->expectException(\Exception::class);
        $tarjeta->pagarPasaje();
    }
    /*
    public function testDescuentoViajePlus() {
        $tarjeta = new TarjetaViajePlus(300);

        $tarjeta->realizarViaje();
        $saldoDespuesViaje = $tarjeta->getSaldo();

        // Validamos que el saldo se descuente correctamente luego de otorgar el viaje plus.
        $this->assertEquals(88.16, $saldoDespuesViaje, '', 0.01); // Usamos una tolerancia de 0.01 debido a posibles errores de redondeo
    }*/
}
