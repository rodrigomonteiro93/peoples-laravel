<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Pessoa;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Pessoa::class, function (Faker $faker) {
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
    return [
        'id' => intval(DB::select("select nextval('seq_pessoa')")['0']->nextval),
        'nome' => $faker->name,
        'nascimento' => $faker->date('Y-m-d'),
        'genero' => $gen,
        'pais_id' => rand(1,2)
    ];
});
