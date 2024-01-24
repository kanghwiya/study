<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    
    protected $primaryKey = 't_pk';
    public $timestamps = false;

    protected $guarded = [
        'u_pk'
    ];

    protected $dates = [
        't_ext'
    ];
}
