<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniSkill extends Model
{
    use HasFactory;

    public function Skill(){
        return $this->belongsTo(Skill::class);
    }
    public function Alumni(){
        return $this->belongsTo(Alumni::class);
    }
}
