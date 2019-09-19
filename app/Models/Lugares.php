<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lugares extends Model
{
	use Notifiable;
    protected $table='lugar';
    public $timestamps =false;

   protected $fillable = [
         'Descripcion',];

   public function lugares(){
            //return this->hasMany(Lugates::class);
            return $this->hasOne('App\Models\Tramite','creo' ,'id');
        }

    
}

