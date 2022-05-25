<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $fillable = [ 'pasta', 'url', 'bilhete', 'cadastrado' ];
    protected $hidden = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];
}
