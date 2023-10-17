<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    protected $primaryKey = 'id';
    protected $fillable =    [
        'name',
        'processo_id',
        'caminho',
        'criado_por',
        'actualizado_por'
        ];

    //funciona para aceder a chave estrageira da outra tabela
    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
