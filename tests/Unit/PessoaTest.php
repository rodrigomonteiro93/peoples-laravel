<?php

namespace Tests\Unit;

use App\Model\Pessoa;
use PHPUnit\Framework\TestCase;

class PessoaTest extends TestCase
{
    private $pessoa;

    public function testData()
    {
        $people = new Pessoa();

        $expected = [
            'nome',
            'nascimento',
            'genero',
            'pais_id'
        ];

        $arrayCompare = array_diff($expected, $people->getFillable());

        $this->assertEquals(0, count($arrayCompare));

    }

    public function testIncrementing()
    {
        $this->assertTrue($this->pessoa->incrementing);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->pessoa = new Pessoa();
    }
}
