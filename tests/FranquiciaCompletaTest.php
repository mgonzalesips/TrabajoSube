<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends TestCase
{
    public function testSaldoInicial()
    {
        $franquicia = new FranquiciaCompleta();

        $this->assertEquals(0, $franquicia->saldo);
    }

    public function testMinSaldo()
    {
        $franquicia = new FranquiciaCompleta();

        $this->assertEquals(~211.84, $franquicia->minsaldo);
    }

    public function testMaxSaldo()
    {
        $franquicia = new FranquiciaCompleta();
        
        $this->assertEquals(6600, $franquicia->maxsaldo);
    }
}
