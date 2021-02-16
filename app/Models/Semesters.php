<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semesters extends Model
{
    use HasFactory;

    protected $guarded = ['name'];

    public function kontraks()
    {
        return $this->hasMany('App\Models\kontraks');
    }
}
