<?php

namespace App\Livewire\Admin;

use App\Models\Livro;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Book extends Component
{
    use LivewireAlert;

    public $titulo, $autor, $editora, $ano_publicacao;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'editora' => 'required|string|max:255',
        'ano_publicacao' => 'required'
    ];

    public function salvar()
    {
        try {
            $this->validate();

            Livro::create([
                'titulo' => $this->titulo,
                'autor' => $this->autor,
                'editora' => $this->editora,
                'ano_publicacao' => $this->ano_publicacao,
            ]);

            $this->alert('success', 'SUCESSO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Livro Cadastrado",
            ]);
    
            $this->reset();
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Falha ao realizar operação",
            ]); 
        }
    }

    public function render()
    {
        return view('livewire.admin.book',[
            "books" => Livro::get()
        ])->layout("layout.app");
    }
}
