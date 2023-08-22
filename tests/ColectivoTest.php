<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase
{
    function testTarjeta()
    {
        $tarjeta = new Tarjeta(500);

        echo "Saldo inicial: {$tarjeta->getSaldo()}\n";
        $tarjeta->cargarSaldo(300);
        echo "Saldo después de cargar \$300: {$tarjeta->getSaldo()}\n";

        try {
            $tarjeta->cargarSaldo(-100); // Intentar cargar saldo negativo
        } catch (Exception $e) {
            echo "Error al cargar saldo negativo: {$e->getMessage()}\n";
        }

        echo "Saldo final: {$tarjeta->getSaldo()}\n";
    }

    // Test de la clase Colectivo
    function testColectivo()
    {
        $tarjeta = new Tarjeta(500);
        $colectivo = new Colectivo();

        try {
            $boleto = $colectivo->pagarCon($tarjeta);
            echo "Se ha pagado un pasaje. Monto: {$boleto->getMonto()}, Saldo restante: {$boleto->getSaldoRestante()}\n";
        } catch (Exception $e) {
            echo "Error al pagar el pasaje: {$e->getMessage()}\n";
        }

        try {
            $tarjeta->cargarSaldo(100);
            $boleto = $colectivo->pagarCon($tarjeta);
            echo "Se ha pagado un pasaje. Monto: {$boleto->getMonto()}, Saldo restante: {$boleto->getSaldoRestante()}\n";
        } catch (Exception $e) {
            echo "Error al pagar el pasaje: {$e->getMessage()}\n";
        }
    }

    // Test de la clase Boleto
    function testBoleto()
    {
        $boleto = new Boleto(120, 380);

        echo "Monto del boleto: {$boleto->getMonto()}\n";
        echo "Saldo restante: {$boleto->getSaldoRestante()}\n";
    }
}