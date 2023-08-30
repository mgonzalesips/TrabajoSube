<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testGetLinea() {
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
    }

    public function testComprarTarjeta() {
        // Crear el objeto necesario para la prueba
        $colectivo = new Colectivo('Linea 1');
        $tarjeta = new Tarjeta();
    
        // Realizar la acción que se está probando
        $boleto = $colectivo->pagarCon($tarjeta);
    
        // Realizar una aserción para verificar el resultado
        $this->assertInstanceOf(Boleto::class, $boleto);
    }
    
}
