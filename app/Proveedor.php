<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'dbo_proveedor';

    protected $primaryKey = 'id_proveedor';

    protected $fillable = [ 'nombre', 'ApePat', 'ApeMat', 'DNI', 'direccion', 'flag', 'email' ];

    public $timestamps = false;
}
