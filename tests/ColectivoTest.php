<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testGetLinea() {
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
        // verificamos que al crear un nuevo constructor y pasarle como argumento 103 (la linea), despues obtengamos el mismo valor al solicitar la linea
    }

    public function testComprarTarjeta() {
        // creamos una nueva clase de colectivo y le asignamos la linea 1
        $colectivo = new Colectivo('Linea 1');
        // creamos una nueva tarjeta
        $tarjeta = new Tarjeta();
    
        //creamos una variable boleto 
        $boleto = $colectivo->pagarCon($tarjeta);
    
        $this->assertInstanceOf(Boleto::class, $boleto);
    }

    public function testCargas() {
        // define las cargas válidas
        $cargasValidas = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

        foreach ($cargasValidas as $carga) {
            // para cada iteracion creo una tarjeta nueva, para que la el saldo comience en 0
            $tarjeta = new Tarjeta();
            // llama a la función cargarSaldo con cada carga válida
            $result = $tarjeta->cargarSaldo($carga);

            // confirma que la carga se realizó correctamente
            $this->assertTrue($result);

            // confirma que el saldo se incrementó correctamente
            $this->assertEquals($tarjeta->saldo, $carga);
        }
    }
    
}
