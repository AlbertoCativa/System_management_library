<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titulo',
        'autor',
        'editora',
        'ano_publicacao'
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
