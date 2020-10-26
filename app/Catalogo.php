<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table = 'dbo_catalogo';

    protected $primaryKey = 'id_catalogo';

    
    protected $fillable = [  'id_catalogo', 'id_subtipo', 'codigo', 'caracteristica', 'flag' ];
}
