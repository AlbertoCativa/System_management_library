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
                    <div class="form-group">
                        <label>Estudante/Leitor</label>
                        <select wire:model="leitor_id" required class="form-control">
                            <option selected>Selecione o estudante ou Leitor</option>
                            @foreach($leitor as $leitors)
                                <option value="{{ $leitors->id }}">{{ $leitors->nome }} ({{ $leitors->curso }}) - {{ $leitors->level }} - {{ $leitors->period }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Livro</label>
                        <select wire:model="livro_id" required class="form-control">
                            <option selected>Selecione o livro</option>
                            @foreach($livros as $livro)
                                <option value="{{ $livro->id }}">{{ $livro->titulo }} ({{ $livro->autor }})</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label>Data de Devolução</label>
                        <input class="form-control" type="date" wire:model="data_devolucao" required>
                    </div>
        
                    <button class="btn btn-primary" type="submit">Emprestar</button>
                </form>
            
            </div>
        </div>
    </div>
</div>
