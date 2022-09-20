<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    use HasFactory;

    public function alumniSkill(){
        return $this->hasMany(AlumniSkill::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
