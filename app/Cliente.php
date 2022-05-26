<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [ 'cpf', 'nome', 'nascimento', 'email', 'telefone', 'cep', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'uf' ];

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = Helper::onlyNumbers($value);
    }

    public function setCepAttribute($value)
    {
        $this->attributes['cep'] = Helper::onlyNumbers($value);
    }

    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = Helper::onlyNumbers($value);
    }
}
