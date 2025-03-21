<div>
    <div class="container w-100" style="max-width: 900px;">
        <div class="row align-items-center">
            <!-- Seção Esquerda - Logo e Texto -->
            <div class="col-md-6 mb-4 mb-md-0 text-center align-items-center">
                <img width="350" src="{{ asset("ispsml.png") }}" alt="">
                <p class="fs-4 text-muted text-center">Bem-Vindo ao Sistema de Gestão de Biblioteca ISPSML.</p>
            </div>

            <!-- Seção Direita - Formulário -->
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <form wire:submit="login">
                        <div class="mb-3">
                            <input type="text" wire:model="email" class="form-control form-control-lg" placeholder="Email da sua conta" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" wire:model="password" class="form-control form-control-lg" placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary text-white w-100 fw-semibold py-2"> Entrar </button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="text-primary text-decoration-none">Esqueceu a senha?</a>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <button class="btn btn-success text-white fw-semibold py-2 px-4">Criar nova conta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>