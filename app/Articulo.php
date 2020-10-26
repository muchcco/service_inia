<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    protected $primaryKey = 'id';

    
    protected $fillable = [  'id_subtipo', 'id_user', 'id_sede', 'id_forma_pago', 'articulo', 'costo', 'plazo_entrega', 'monto_total' ,'cantidad','cantidad_muestra' ,  'observacion', 'informe', 'flag' ];
}
