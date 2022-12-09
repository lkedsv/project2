<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\endereco;

class cliente extends Model
{

    protected $table = 'clientes';
    protected $fillable = [
        'nome',
        'cpf',
        'categoria',
        'telefone',
        'user_id'      //Necessário no model
    ];

    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function enderecos(){
        return $this->hasMany(endereco::class, 'cliente_id');
    }
}
