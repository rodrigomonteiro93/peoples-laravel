<?php

namespace Tests\Feature;

use App\Model\Pais;
use App\Model\Pessoa;
use Tests\TestCase;

class PessoaTest extends TestCase
{

    public function testPeople()
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
        //Test show
        $testHome = $this->get('/show/'.$data['id']);
        $testHome->assertStatus(200);
        //Test Update
        $this->updateData($data);
        //Test Delete
        $this->deleteData($data);
    }

    public function updateData($data){
        $response = $this->json('PUT', route('pessoa.update', $data['id']), [
            'nome' => ' (editado via - Test)',
            'nascimento' => $data['nascimento'],
            'genero' => $data['genero'],
            'pais_id' => $data['pais_id']
        ]);
        $responseTest = $response->json('people');
        $newData = Pessoa::find($responseTest['id']);

        $this->assertEquals($responseTest, $newData->toArray());
    }

    public function deleteData($data){
        $testHome = $this->get('destroy/'.$data['id']);
        $testHome->assertStatus(200);
    }

    public function testClear(){
        factory(\App\Model\Pessoa::class, 15)
            ->create();
        $testHome = $this->get('/clear');
        $testHome->assertStatus(200);
    }

    public function testIndex(){
        $testHome = $this->get('/');
        $testHome->assertStatus(200);
    }
}
