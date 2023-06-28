<?php

namespace Tests\Unit;

use Tests\TestCase;

class ConexionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $direccion = \App\Direccion::find(1);
        $this->assertTrue(null != $direccion);
    }
}
