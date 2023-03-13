<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unidade;
use App\Models\Endereco;

class Funcionario extends Model
{
    use HasFactory;

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);

    }
}
