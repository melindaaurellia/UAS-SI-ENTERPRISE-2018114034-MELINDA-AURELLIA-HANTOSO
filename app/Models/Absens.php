<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absens extends Model
{
    use HasFactory;

    protected $guarded = ['mana'];

    public function students()
    {
        return $this->belongsTo('App\Models\students');
    }
    public function matakuliahs()
    {
        return $this->belongsTo('App\Models\matakuliahs');
    }
}
