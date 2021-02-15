<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoa';

    public $timestamps = false;

    protected $dates = ['nascimento'];

    protected $fillable = [
        'id',
        'nome',
        'nascimento',
        'genero',
        'pais_id',
    ];

    protected $casts = [
        'nascimento' => 'date:Y-m-d',
    ];

    public function pais(){
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }
}
