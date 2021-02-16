<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwals extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function matakuliahs()
    {
        return $this->hasMany('App\Models\matakuliahs');
    }
}