<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'dbo_tipo';

    protected $primaryKey = 'id_tipo';

    protected $fillable = [  'nombre' ];


    public $timestamps = false;


}
