<div wire:ignore class="modal fade show" id="create_ads" tabindex="-1" role="dialog" aria-labelledby="createAdModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAdModalLabel">Cadastrar Livro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="salvar">

                    <!-- Título -->
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" id="titulo" wire:model="titulo" class="form-control" required>
                        @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Link -->
                    <div class="form-group">
                        <label for="autor">Nome do Autor</label>
                        <input type="text" id="autor" wire:model="autor" class="form-control" required>
                        @error('autor') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Editora -->
                    <div class="form-group">
                        <label for="editora">Editora</label>
                        <input type="text" id="editora" wire:model="editora" class="form-control" placeholder="">
                        @error('editora') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- ano_publicacao -->
                    <div class="form-group">
                        <label for="ano_publicacao">Ano de Publicação</label>
                        <input type="date" id="ano_publicacao" wire:model="ano_publicacao" class="form-control">
                        @error('ano_publicacao') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>