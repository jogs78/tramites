<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Moldels\Tramite;
use Illuminate\Database\Eloquent;


class Seguimiento extends Model
{
	use Notifiable;
    protected $table='historico';
    protected $primaryKey='id';
    public $timestamps =false;

   protected $fillable = [
         'tramite_seguir', 'quien', 'lugar', 'momento', 'direccion'];

	public function seguimiento(){
            //return this->hasMany(Lugates::class);
            return $this->hasMany('App\Models\Tramite','creo' ,'id');
        }    


        public function userTramite(){
			//return this->hasMany(Lugates::class);
			return $this->belongsTo('App\User', 'quien', 'id');
		}

		public function lugarTramite(){
			//return this->hasMany(Lugates::class);
			return $this->belongsTo('App\Models\Lugares', 'lugar', 'id');
		}

    
}
