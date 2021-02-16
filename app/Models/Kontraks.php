<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontraks extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function students()
    {
        return $this->belongsTo('App\Models\students');
    }
    public function semesters()
    {
        return $this->belongsTo('App\Models\semesters');
    }
}