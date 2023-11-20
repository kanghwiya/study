<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'b_id';

    // 수정 가능한 항목(fillable)으로 설정
    protected $fillable = [
        'b_title'
        ,'b_content'
    ];
}
