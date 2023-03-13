<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionario;


class Unidade extends Model
{
    use HasFactory;

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);

    }
}
