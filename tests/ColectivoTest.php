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

    public function testCargas() {
        // Definir las cargas válidas
        $cargasValidas = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

        foreach ($cargasValidas as $carga) {
            // Para cada iteracion creo una tarjeta nueva, para que la el saldo comience en 0
            $tarjeta = new Tarjeta();
            // Llama a la función cargarSaldo con cada carga válida
            $result = $tarjeta->cargarSaldo($carga);

            // Asegurarse de que la carga se realizó correctamente
            $this->assertTrue($result);

            // Asegurarse de que el saldo se incrementó correctamente
            $this->assertEquals($tarjeta->saldo, $carga);
        }
    }
    
}
