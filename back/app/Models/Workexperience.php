<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workexperience extends Model
{
    use HasFactory;
    public function companies(){
        return $this->belongsTo(Company::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
}