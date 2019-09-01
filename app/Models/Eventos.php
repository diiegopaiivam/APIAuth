<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Eventos extends Model
{
    protected $fillable = ['title', 'body'];
    
    public function user(){

        return $this->belongsTo(User::class);
    }
}
