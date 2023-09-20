<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaParcialTest extends TestCase
{
    public function testSaldoInicial()
    {
        $franquicia = new FranquiciaParcial();

        $this->assertEquals(0, $franquicia->saldo);
    }

    public function testMinSaldo()
    {
        $franquicia = new FranquiciaParcial();

        $this->assertEquals(~211.84, $franquicia->minsaldo);
    }

    public function testMaxSaldo()
    {
        $franquicia = new FranquiciaParcial();

        $this->assertEquals(6600, $franquicia->maxsaldo);
    }
}

