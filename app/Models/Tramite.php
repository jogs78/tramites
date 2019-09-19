<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tramite extends Model
{

	use Notifiable;
    protected $table='tramite';
    protected $primaryKey='id';

    public $timestamps =false;

   protected $fillable = [
         'nombre', 'fecha_creacion', 'creo', 'status'];

        public function userTramite(){
			//return this->hasMany(Lugates::class);
			return $this->belongsTo('App\User', 'creo', 'id');
		}

		public function lugarTramite(){
			//return this->hasMany(Lugates::class);
			return $this->belongsTo('App\Models\Lugares', 'creo', 'id');
		}

        public function seguimientoTramite(){
			//return this->hasMany(Tramite::class);
			return $this->belongsTo('App\Models\Seguimiento');
		}
    
}
