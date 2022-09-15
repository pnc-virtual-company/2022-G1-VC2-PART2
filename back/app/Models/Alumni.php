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
    public function workexperience(){
        return $this->hasMany(Workexperience::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function education(){
        return $this->hasMany(Education::class);
    }
    public function skill(){
        return $this->hasMany(Skill::class);
    }
    public function alumniSkill(){
        return $this->hasMany(AlumniSkill::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
