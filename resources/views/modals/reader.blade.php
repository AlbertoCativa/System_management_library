<div wire:ignore class="modal fade show" id="reader" tabindex="-1" role="dialog" aria-labelledby="createAdModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAdModalLabel">Cadastrar Leitores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="salvar">

                    <!-- Título -->
                    <div class="form-group">
                        <label for="title">Nome</label>
                        <input type="text" id="titulo" wire:model="nome" class="form-control" required>
                        @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Link -->
                    <div class="form-group">
                        <label for="autor">Curso</label>
                        <select wire:model="curso" class="form-control">
                            <option selected>Selecione o curso</option>
                            <option>Ciências da Computação</option>
                            <option>Hotelaria e Turismo</option>
                            <option>Gestão Bancaria e Seguros</option>
                            <option>Gestão de Empresas</option>
                            <option>Gestão de Recursos Humanos</option>
                            <option>Direito</option>
                            <option>Logistica e Gestão Comercial</option>
                            <option>Engenharia de Redes e Telecomunicões</option>
                        </select>
                    </div>

                    <!-- Editora -->
                    <div class="form-group">
                        <label for="editora">Turno</label>
                        <select wire:model="period" class="form-control">
                            <option selected>Selecione o periodo</option>
                            <option>Manhã</option>
                            <option>Tarde</option>
                            <option>Noite</option>
                        </select>
                    </div>

                    <!-- ano_publicacao -->
                    <div class="form-group">
                        <label for="level">Ano Curricular</label>
                        <select wire:model="level" class="form-control">
                            <option selected>Selecione o ano do estudante</option>
                            <option>1º Ano</option>
                            <option>2º Ano</option>
                            <option>3º Ano</option>
                            <option>4º Ano</option>
                            <option>5º Ano</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="level">Email</label>
                        <input type="text" id="level" wire:model="email" class="form-control">
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