<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'cliente_id',
    ];

    
    public function clientes(){
        return $this->belongsTo(cliente::class);
    }

    use HasFactory;
}
