<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_diagrama extends Model
{
    use HasFactory;

    protected $table = 'user_diagramas';
    protected $fillable = ['user_id', 'diagrama_id','editar'];
}
