<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participa extends Model
{
    use HasFactory;
    protected $table = 'participas';
    
    protected $fillable = ['user_id', 'proyecto_id'];
}
