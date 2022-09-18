<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniSkill extends Model
{
    use HasFactory;
    public function alumni(){
        return $this->belongsTo(Alumni::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
