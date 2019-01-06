<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name', 'birth', 'gender', 'classroom_id'];

    protected $casts = [
        'birth' => 'date:d/m/Y'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

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
