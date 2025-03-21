<div>
    {{-- HEADER --}}
    <div class="page-header">
        <h3 class="page-title"> Gestão de Emprestimo de Livros </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <button  data-toggle="modal" data-target="#reading" class="btn btn-primary">+ Adicionar</button>
            </li>
          </ol>
        </nav>
      </div>
    {{-- BODY - TABLE ANÚNCIOS --}}

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="table table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Titulo </th>
                  <th> Prateleira </th>
                  <th> Estudante </th>
                  <th> Estado </th>
                </tr>
              </thead>
              <tbody>
                @if (isset($reading) and count($reading) > 0)
                    @foreach ($reading as $item)
                        <tr>
                            <td> {{ $item->livro->titulo }} </td>
                            <td> {{ $item->livro->autor }} </td>
                            <td> {{ $item->leitor->nome }} </td>
                            @if ($item->status == "em_andamento")
                                <td>
                                  <span class="badge-danger p-1 text-capitalize rounded" style="cursor:pointer" wire:click="readingUpdate({{ $item->id }})">Emprestado</span>
                                </td>
                            @else
                            <td>
                              <span class="badge-success p-1 text-capitalize rounded">Devolvido</span>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                 
                @else
                    
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      @include("modals.reading")
</div>