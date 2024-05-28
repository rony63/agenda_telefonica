<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $hidden = [

    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appends = [

    ];

    // protected $fillable = [
    //     'logradouro',
    //     'numero',
    //     'cidade',
    //     'contato_id'
    // ];


}

