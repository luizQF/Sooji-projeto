<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'situacaoAtual', 'user_id', 'descricao', 'venc_date'];

    protected $casts = [
        'dias'=> 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}