<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * 
     * Mapeamento do relacionamento com Classroom..
     * 
     */
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
    }
}
