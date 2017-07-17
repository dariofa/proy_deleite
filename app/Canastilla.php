<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canastilla extends Model
{
   protected $table = "canastillas";

   protected $fillable = [
   			'descripcion',
   			'cantidad'
  		];
}
