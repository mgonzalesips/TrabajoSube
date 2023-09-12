<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testGetLinea() {
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
        // Verificamos que al crear un nuevo colectivo y pasarle como argumento 103 (la línea), después obtengamos el mismo valor al solicitar la línea.
    }

    public function testComprarTarjeta() {
        // Creamos una nueva clase de colectivo y le asignamos la línea 1
        $colectivo = new Colectivo('Linea 1');
        // Creamos una nueva tarjeta
        $tarjeta = new Tarjeta();
        // Establecemos una fecha
        $fecha = '1.1.1';
        
        // Creamos una variable boleto 
        $boleto = $colectivo->pagarCon($tarjeta, $fecha);
        
        $this->assertInstanceOf(Boleto::class, $boleto);
    }
    
    public function testPagarConTarjetaConSaldoSuficiente() {
        $colectivo = new Colectivo('Linea 1');
        $tarjeta = new Tarjeta();
        $fecha = '1.1.1';
    
        // Cargamos saldo suficiente para pagar un pasaje
        $tarjeta->cargarSaldo(Tarjeta::TARIFA);
    
        $boleto = $colectivo->pagarCon($tarjeta, $fecha);
    
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertInstanceOf(Colectivo::class, $boleto->getColectivo());
        $this->assertInstanceOf(Tarjeta::class, $boleto->getTarjeta());
        $this->assertEquals($boleto->getFecha(), '1.1.1');
    }
    
    public function testPagarConTarjetaSinSaldoSuficiente() {
        $colectivo = new Colectivo('Linea 1');
        $tarjeta = new Tarjeta();
        $fecha = '1.1.1';
    
        // Intentamos pagar un pasaje sin cargar saldo
        $boleto = $colectivo->pagarCon($tarjeta, $fecha);
    
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertInstanceOf(Colectivo::class, $boleto->getColectivo());
        $this->assertInstanceOf(Tarjeta::class, $boleto->getTarjeta());
        $this->assertEquals($boleto->getFecha(), '1.1.1');
    }
    

    public function testearBoleto() {
        $colectivo = 115;
        $tarjeta = '4hk32h4k3h2h4';
        $fecha = '24.11.23';
    
        $boleto = new Boleto($colectivo, $tarjeta, $fecha);
    
        $this->assertEquals($boleto->getColectivo(), 115);
        $this->assertEquals($boleto->getTarjeta(), '4hk32h4k3h2h4');
        $this->assertEquals($boleto->getFecha(), '24.11.23');
    }

    public function testCargas() {
        // Define las cargas válidas
        $cargasValidas = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

        foreach ($cargasValidas as $carga) {
            // Para cada iteración, creo una tarjeta nueva, para que el saldo comience en 0
            $tarjeta = new Tarjeta();
            // Llama a la función cargarSaldo con cada carga válida
            $result = $tarjeta->cargarSaldo($carga);

            // Confirma que la carga se realizó correctamente
            $this->assertTrue($result);

            // Confirma que el saldo se incrementó correctamente
            $this->assertEquals($tarjeta->saldo, $carga);
        }
    }
    
}
