<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'start', 'end', 'all_day'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
