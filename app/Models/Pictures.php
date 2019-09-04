<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Eventos;

class Pictures extends Model
{
    public function eventos(){

        return $this->belongsTo(Eventos::class);
    }
}
