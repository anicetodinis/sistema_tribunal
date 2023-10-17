<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;


    protected $table = 'processo';
    protected $primaryKey = 'id';
    protected $fillable =    [
        'numero_processo',
        'juiz_id',
        'especie',
        'data',
        'criado_por',
        'actualizado_por'
        ];

    //funciona para aceder a chave estrageira da outra tabela
    public function sessao()
    {
        return $this->belongsTo(Sessao::class);
    }

    public function juiz(){
        return $this->belongsTo(Juiz::class);
    }
}
