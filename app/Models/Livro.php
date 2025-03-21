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
        'ano_publicacao',
        'category_id'
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
