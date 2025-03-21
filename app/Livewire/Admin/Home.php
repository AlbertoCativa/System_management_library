<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Emprestimo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
//use Barryvdh\DomPDF\Facade as PDF;
//use Maatwebsite\Excel\Facades\Excel;
//use App\Exports\EmprestimosExport;

class Home extends Component
{
    public $labels = [], $titleDay = [], $plus = [], $periodTitle = [], $periodNumber = [];
    public $data = [], $dataDay = [], $dataPlus = [], $dados;

    public function mount()
    {
        $this->prepareData();
        $this->plusReading();
        $this->plusPeriod();
        $this->day();
    }

    public function prepareData()
    {
        // Contando o número de empréstimos por status (em_andamento, devolvido)
        $emprestimosStatus = Emprestimo::whereDate('created_at', Carbon::today())
        ->selectRaw('status, count(*) as count')
        ->groupBy('status')
        ->pluck('count', 'status');
        
        // Preparando as labels e dados para o gráfico
        $this->labels = $emprestimosStatus->keys()->toArray();
        $this->data = $emprestimosStatus->values()->toArray();
    }

    public function day()
    {
        $emprestimosPorDia = Emprestimo::selectRaw('DATE(created_at) as data, COUNT(*) as total')
        ->groupBy('data')->orderBy('data', 'asc')
        ->pluck('total', 'data');

        // Labels serão as datas, e os dados serão os totais de empréstimos por dia
        $this->titleDay = $emprestimosPorDia->keys()->toArray();
        $this->dataDay = $emprestimosPorDia->values()->toArray();
    }

    public function plusReading()
    {
        //$this->dados = Emprestimo::join('leitors', 'leitors.id', 'emprestimos.leitor_id')
        $dados = Emprestimo::join('leitors', 'leitors.id', 'emprestimos.leitor_id')
        ->select('leitors.curso', DB::raw('count(emprestimos.id) as total_emprestimos'))
        ->groupBy('leitors.curso')->get();
        // Prepare os dados para o Chart.js
        $this->plus = $dados->pluck('curso');
        $this->dataPlus = $dados->pluck('total_emprestimos');
    }

    public function plusPeriod()
    {
        // Executa a query e armazena os resultados em uma variável temporária
        $period = Emprestimo::join('leitors', 'leitors.id', '=', 'emprestimos.leitor_id')
            ->select('leitors.period', DB::raw('count(emprestimos.id) as total_emprestimos'))
            ->groupBy('leitors.period')
            ->get();

        // Extrai os valores corretamente
        $this->periodTitle = $period->pluck('period')->toArray();
        $this->periodNumber = $period->pluck('total_emprestimos')->toArray();
    }


    public function render()
    {
        return view('livewire.admin.home')->layout("layout.app");
    }
}
