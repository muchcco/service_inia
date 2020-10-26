<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtipo extends Model
{
    protected $table = 'dbo_subtipo';

    protected $primaryKey = 'id_subtipo';

    
    protected $fillable = [  'id_tipo', 'nombre' ];

    public $timestamps = false;
}
