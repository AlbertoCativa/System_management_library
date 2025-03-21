<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Component
{
    use LivewireAlert;
    public $email, $password;

    // Método para autenticar o usuário
    public function login()
    {
        // Validação dos dados de login
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verifica se o usuário com o e-mail fornecido existe
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            // Se o usuário não existir, dispara uma mensagem de erro
            $this->alert('info', 'Informação', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => "A conta com este e-mail não existe.",
            ]);
            return;
        }

        // Se o usuário existir, tenta fazer login com as credenciais fornecidas
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Redireciona para a página inicial após o login bem-sucedido
            return redirect()->route('home');
        } else {
            // Se a senha estiver errada
            $this->alert('error', 'Credenciais inválidas', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout("layout.auth");
    }
}
