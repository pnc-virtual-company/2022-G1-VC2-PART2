<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Workexperience extends Model
{
    use HasFactory;
    public function Company(){
        return $this->belongsTo(Company::class);
    }
    
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];
   
}