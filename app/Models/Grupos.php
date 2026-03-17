<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    /** @use HasFactory<\Database\Factories\GruposFactory> */
    use HasFactory;
    protected $table = 'grupos';
    protected $fillable = ['name', 'desc', 'tarefa_id', 'user_id'];

    public function tarefas(){
        return $this->hasMany(Tarefa::class, 'grupo_id');
    }
}
