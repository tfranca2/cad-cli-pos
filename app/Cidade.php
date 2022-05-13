<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    protected $table = 'cidades';

	protected $fillable = [ 'nome', 'estado_id', 'populacao' ];
    
    public function estado(){
        return $this->hasOne( 'App\Estado', 'id', 'estado_id' );
    }

}
