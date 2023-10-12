<?php
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaTest extends TestCase  {

    public function testDescuentosJubilados() {
        $tarjetaJubilado = new Jubilado();
        $tarjetaJubilado->saldo = 1000;
        $tarjetaJubilado->pagarPasaje();
        $this->assertEquals($tarjetaJubilado->getSaldo(), 1000);

    }


    public function testDescuentosBoletoGratuito() {
        $tarjetaGratuita = new BoletoGratuito();
        $tarjetaGratuita->saldo = 1000;
        $tarjetaGratuita->pagarPasaje();
        $this->assertEquals($tarjetaGratuita->getSaldo(), 1000);
        
    }

    public function testDescuentosMedioBoleto() {
        $tarjetaMedioBoleto = new MedioBoleto();
        $tarjetaMedioBoleto->saldo = 1000;
        $tarjetaMedioBoleto->pagarPasaje();
        $this->assertEquals($tarjetaMedioBoleto->getSaldo(), 940);
        
    }
}


