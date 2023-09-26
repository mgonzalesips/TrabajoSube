<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaParcialTest extends TestCase
{
    public function testInicializacion()
    {
        $franquicia = new FranquiciaParcial();

        $this->assertEquals(0, $franquicia->saldo);
        $this->assertEquals(~211.84, $franquicia->minsaldo);
        $this->assertEquals(6600, $franquicia->maxsaldo);
    }
}

