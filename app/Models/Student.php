<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name', 'birth', 'gender', 'classroom_id'];

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
