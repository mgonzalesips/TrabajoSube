<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testGetLinea() {
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
    }

    public function testComprarTarjeta() {
        $tarjeta = new Tarjeta();
        $montoPagado = $tarjeta->getMontoPagado();
        $saldo = $tarjeta->getSaldo();

        // Agregar aserciones para verificar los valores de $montoPagado y $saldo si es necesario
        // Ejemplo: $this->assertEquals(0, $montoPagado);
        //          $this->assertEquals(100, $saldo);
    }
}
