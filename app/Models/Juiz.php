<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juiz extends Model
{
    use HasFactory;
    protected $table = 'juiz';
    protected $primaryKey = 'id';
    protected $fillable =    [
        'name',
        'criado_por',
        'actualizado_por',
        'sessao_id'
        ];

    //funciona para aceder a chave estrageira da outra tabela
    public function sessao()
    {
        return $this->belongsTo(Sessao::class);
    }


}
