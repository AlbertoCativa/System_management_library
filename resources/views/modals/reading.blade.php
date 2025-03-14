<div wire:ignore class="modal fade show" id="reading" tabindex="-1" role="dialog" aria-labelledby="createAdModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAdModalLabel">Cadastrar Leitores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="emprestar">
                    <div>
                        <label>Número de Acesso</label>
                        <input type="text" wire:model="numero_acesso" wire:change="buscarLeitor" required>
                    </div>
                    <h1></h1>
                    <div>
                        <label>Livro</label>
                        <select wire:model="livro_id" required>
                            @foreach($livros as $livro)
                                <option value="{{ $livro->id }}">{{ $livro->titulo }} ({{ $livro->autor }})</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div>
                        <label>Data de Devolução</label>
                        <input type="date" wire:model="data_devolucao" required>
                    </div>
        
                    <button type="submit">Emprestar</button>
                </form>
            
            </div>
        </div>
    </div>
</div>
