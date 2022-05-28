<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $fillable = [ 'pasta', 'url', 'bilhete', 'cadastrado', 'user_id' ];
    protected $hidden = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

    public static function getCanhoto()
    {
        return self::inRandomOrder()->where('user_id', Auth::user()->id )->where('cadastrado', 0)->first();
    }

    public function setCadastrado()
    {
        return $this->update([ 'cadastrado' => 1 ]);
    }
}
