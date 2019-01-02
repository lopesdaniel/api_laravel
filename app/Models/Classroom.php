<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    protected $fillable = ['description'];

    /**
     * 
     * Mapeamento do relacionamento com a classe Student...
     * 
     */
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }


}
