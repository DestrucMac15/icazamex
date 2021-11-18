<?php

namespace App\Models;

use App\Models\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends ParentModel
{
    use HasFactory;
    use UserTrait;

    protected $table = 'inmuebles';

    public function tipoinmueble(){
        return $this->belongsTo(TipoInmueble::class, 'tipo_inmueble_id');
    }

    public function servicios(){
        return $this->belongsToMany(Servicio::class, 'inmuebles_servicios');
    }

    public function generales(){
        return $this->belongsToMany(General::class, 'inmuebles_generales');
    }

    public function exteriores(){
        return $this->belongsToMany(Exterior::class, 'inmuebles_exteriores');
    }

    public function amenidades(){
        return $this->belongsToMany(Amenidad::class, 'inmuebles_amenidades');
    }

    public function restricciones(){
        return $this->belongsToMany(Restriccion::class, 'inmuebles_restricciones');
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function tipoOperacion(){
        return $this->belongsTo(TipoOperacion::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function imagenes(){
        return $this->belongsToMany(Multimedia::class, 'inmuebles_imagenes')->where('tipo', 'images');
    }

    public function archivos(){
        return $this->belongsToMany(Multimedia::class, 'inmuebles_imagenes')->where('tipo', 'files');
    }

    public function videos(){
        return $this->belongsToMany(Multimedia::class, 'inmuebles_imagenes')->where('tipo', 'videos');
    }

    public function multimedia(){
        return $this->belongsToMany(Multimedia::class, 'inmuebles_imagenes');
    }

    public function inversiones(){
        return $this->hasMany(Inversion::class);
    }
}
