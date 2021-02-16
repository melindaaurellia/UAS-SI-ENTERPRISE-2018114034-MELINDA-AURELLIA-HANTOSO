<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function absens()
    {
        return $this->hasMany('App\Models\Absens');
    }
    public function kontraks()
    {
        return $this->hasMany('App\Models\kontraks');
    }
}
