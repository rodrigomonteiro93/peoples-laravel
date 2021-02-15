<?php

namespace Tests\Feature;

use App\Model\Pais;
use App\Model\Pessoa;
use Tests\TestCase;

class PessoaTest extends TestCase
{

    public function testStore()
    {
        $faker = \Faker\Factory::create();
        $rand = rand(1, 3);
        switch ($rand){
            case 1;
                //Masculino
                $gen = 'm';
                break;
            case 2;
                //Feminino
                $gen = 'f';
                break;
            case 3;
                //Não informado
                $gen = null;
                break;
        }

        $pais = Pais::inRandomOrder()->get()->first()->id;

        $response = $this->json('POST', route('pessoa.store'), [
            'nome' => $faker->name.' (criado via - Test)',
            'nascimento' => $faker->date('Y-m-d'),
            'genero' => $gen,
            'pais_id' => $pais
        ]);

        $id = $response->json('id');
        $data = Pessoa::where('id', $id)->get();

        $responseTest = $response->json('people');
        $data = $data->toArray()[0];

        $this->assertEquals($responseTest, $data);
    }

    public function testIndex(){
        $testHome = $this->get('/');
        $testHome->assertStatus(200);
    }
}
