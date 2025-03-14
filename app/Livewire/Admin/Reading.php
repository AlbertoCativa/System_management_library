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

    public $numero_acesso, $reading, $livro_id, $leitor, $livro, $data_devolucao;

    public function mount(){
        $this->reading = Emprestimo::get();
    }

    public function buscarLeitor()
    {
        $this->leitor = Leitor::where('number', $this->numero_acesso)->get();
    }

    public function emprestar()
    {


        $livro = Livro::find($this->livro_id);
        if ($livro) {
            Emprestimo::create([
                'leitor_id' => 2,
                'livro_id' => $livro->id,
                'data_emprestimo' => now(),
                'data_devolucao' => $this->data_devolucao,
            ]);

            $livro->quantidade -= 1;
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
    
    public function render()
    {
        return view('livewire.admin.reading', ["livros" => Livro::get()])->layout("layout.app");
    }


}
