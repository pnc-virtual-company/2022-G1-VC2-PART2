<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function workexperience(){
        return $this->hasMany(Workexperience::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}