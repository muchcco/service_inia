<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'dbo_almacen';

    protected $primaryKey = 'id_almacen';

    
    protected $fillable = [ 'id_detalle_ingreso', 'id_sede' ,'id_catalogo', 'stock', 'costo_analisis', 'forma_pago', 'plazo_entrega', 'observacion' ];
}
