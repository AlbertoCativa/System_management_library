<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'leitor_id',
        'livro_id',
        'data_emprestimo',
        'data_devolucao',
    ];

    public function leitor()
    {
        return $this->belongsTo(Leitor::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
