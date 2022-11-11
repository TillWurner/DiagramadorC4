<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagramas extends Model
{
    protected $table = 'diagramas';

    protected $fillable =['id_user','nom','desc','code', 'json'];

    use HasFactory;

    //De muchos a uno
    public function diagu(){
        return $this->belongsTo(user::class,'id_user');
    }
}
