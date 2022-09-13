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
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
