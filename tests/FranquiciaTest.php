<?php
namespace TrabajoSube;


use PHPUnit\Framework\TestCase;


class FranquiciaTest {

    public function testDescuentos() {
        $tarjeta = new Tarjeta();

        // Caso de tarjeta de jubilado
        $tarjeta->saldo = 1000;
        $tarjeta->tipoTarjeta = 'Jubilado';
        $tarjeta->pagarPasaje();
        echo "Saldo después de pagar con tarjeta de jubilado: $" . $tarjeta->getSaldo() . "\n"; // Debería ser 1000, ya que no se resta saldo.

        // Caso de tarjeta gratuita
        $tarjeta->saldo = 1000;
        $tarjeta->tipoTarjeta = 'Gratuito';
        $tarjeta->pagarPasaje();
        echo "Saldo después de pagar con tarjeta gratuito: $" . $tarjeta->getSaldo() . "\n"; // Debería ser 1000, ya que no se resta saldo.

        // Caso de tarjeta de medio boleto
        $tarjeta->saldo = 1000;
        $tarjeta->tipoTarjeta = 'Medio Boleto';
        $tarjeta->pagarPasaje();
        echo "Saldo después de pagar con tarjeta de medio boleto: $" . $tarjeta->getSaldo() . "\n"; // Debería ser 940, ya que se resta la mitad de la tarifa.

    }
}

$test = new FranquiciaTest();
$test->testDescuentos();

