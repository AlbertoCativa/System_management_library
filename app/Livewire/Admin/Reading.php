<?php

namespace App\Livewire\Admin;

use App\Models\Emprestimo;
use App\Models\Leitor;
use App\Models\Livro;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Reading extends Component
{
    use LivewireAlert;

    public $leitor_id, $reading, $livro_id, $leitor, $livro, $data_devolucao;

    public function mount(){
        $this->reading = Emprestimo::get();
        $this->leitor = Leitor::get();
    }

    public function emprestar()
    {


        $livro = Livro::find($this->livro_id);
        if ($livro) {
            Emprestimo::create([
                'leitor_id' => $this->leitor_id,
                'livro_id' => $livro->id,
                'data_emprestimo' => now(),
                'data_devolucao' => $this->data_devolucao,
            ]);

            $livro->save();

            $this->alert('success', 'SUCESSO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Livro emprestado com sucesso!",
            ]);

        } else {
            $this->alert('error', 'ERRO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Livro não disponível para empréstimo!",
            ]);
        }
    }

    public function readingUpdate($id)
    {
        $reading = Emprestimo::find($id);
        if($reading){
            $reading->status = 'Devolvido';
            $reading->save();
        }
        $this->alert('success', 'SUCESSO', [
            'position' => 'center',
            'toast' => false,
            'timer' => 2000,
            'text' => "Livro Devolvido",
        ]);
    }
    
    public function render()
    {
        $this->mount();
        return view('livewire.admin.reading', ["livros" => Livro::get()])->layout("layout.app");
    }
}