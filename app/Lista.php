<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $fillable = [ 'pasta', 'url', 'bilhete', 'cadastrado', 'user_id' ];
    protected $hidden = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

    public static function getLastPasta()
    {
        return self::select('pasta')->distinct()->orderBy('pasta', 'DESC')->first()['pasta'];
    }

    public static function getCanhoto($pasta = '')
    {
        if( !$pasta )
            $pasta = self::getLastPasta();
        return self::inRandomOrder()->where('pasta', $pasta)->where('cadastrado', 0)->first();
    }

    public function setCadastrado()
    {
        return $this->update([ 'cadastrado' => 1 ]);
    }
}
