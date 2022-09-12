<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable=[
        'profile',
        'batch',
        'gender',
        'phone',
        'major',
    ];
    public function Workexperience(){
        return $this->hasmany(Workexperience::class);
    }
}