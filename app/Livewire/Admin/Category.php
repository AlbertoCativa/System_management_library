<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Category extends Component
{
    public $description, $categories;
    use LivewireAlert;

    public function saveCategory()
    {
        try{
            ModelCategory::create([
                'description' => $this->description
            ]);

            $this->alert('success', 'SUCESSO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Categoria Cadastrada",
            ]);

        }catch(\Throwable $th){
            $this->alert('error', 'ERRO', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "Falha ao realizar Operação",
            ]);
        }
    }

    public function render()
    {
        $this->categories = ModelCategory::get();
        return view('livewire.admin.category')->layout("layout.app");
    }
}