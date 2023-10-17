<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;
    protected $table = 'sessao';
    protected $primaryKey = 'id';
    protected $fillable =    [
        'name',
        'criado_por',
        'actualizado_por',
    ];

}
