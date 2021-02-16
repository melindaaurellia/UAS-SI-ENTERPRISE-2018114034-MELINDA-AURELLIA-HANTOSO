<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliahs extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function absens()
    {
        return $this->hasMany('App\Models\absens');
    }
    public function jadwals()
    {
        return $this->hasMany('App\Models\jadwals');
    }
}
