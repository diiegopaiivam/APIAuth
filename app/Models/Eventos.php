<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Pictures;

class Eventos extends Model
{
    protected $fillable = ['title', 'body'];
    
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function pictures(){

        return $this->hasMany(Pictures::class);
    }
}
