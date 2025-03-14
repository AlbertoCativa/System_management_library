<?php

namespace App\Livewire\Admin;

use App\Models\Leitor;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Reader extends Component
{
    use LivewireAlert;

    public $nome, $email, $curso, $level, $period, $number;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:leitors,email',
        'curso' => 'required|string|max:255',
        'level' => 'required|string|max:255',
        'period' => 'required|string|max:255',
    ];

    public function salvar()
    {
        try {
            $this->validate();

            Leitor::create([
                'nome' => $this->nome,
                'email' => $this->email,
                'curso' => $this->curso,
                'level' => $this->level,
                'period' => $this->period,
                'number' => rand(1000, 9999),
            ]);

            $this->alert('success', 'SUCESSO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Leitor Cadastrado",
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

        return view('livewire.admin.reader',["leitors" => Leitor::get()])->layout("layout.app");
    }
}
