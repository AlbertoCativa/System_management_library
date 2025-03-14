<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    use HasFactory;
    protected $table = "leitors";

    protected $fillable = [
        'nome', // Adicione aqui
        'email',
        'curso',
        'level',
        'period',
        'number',
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

}