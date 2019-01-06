<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Indica os atributos para definição em massa
     */
    protected $fillable = ['name', 'birth', 'gender', 'classroom_id'];

    // /**
    //  * Formatação da data de nascimento (Ocorre na hora de serialização)
    //  */
    // protected $casts = [
    //     'birth' => 'date:d/m/Y'
    // ];

    // /**
    //  * Define os atributos a não serem mostrados após a serialização
    //  */
    // protected $hidden = [
    //     'created_at',
    //     'updated_at'
    // ];

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
