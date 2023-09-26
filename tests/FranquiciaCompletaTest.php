<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends TestCase
{
    public function testInicializacion()
    {
        $franquicia = new FranquiciaCompleta();

        $this->assertEquals(0, $franquicia->saldo);
        $this->assertEquals(~211.84, $franquicia->minsaldo);
        $this->assertEquals(6600, $franquicia->maxsaldo);
    }
}

