<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
    protected $table = 'notificacions';
    
    protected $fillable = ['contenido', 'aceptado', 'leido', 'proyecto_id', 'user_id'];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
}
