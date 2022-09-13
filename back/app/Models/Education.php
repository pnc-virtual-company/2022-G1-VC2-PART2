<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public function Univercity(){
        return $this->belongsTo(Univercity::class);
    }
    public function Univernity(){
        return $this->belongsTo(Alumni::class);
    }
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];

}