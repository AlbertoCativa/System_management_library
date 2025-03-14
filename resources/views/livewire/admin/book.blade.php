<div>
    {{-- HEADER --}}
    <div class="page-header">
        <h3 class="page-title"> Gestão de Livros </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <button  data-toggle="modal" data-target="#create_ads" class="btn btn-primary">+ Adicionar</button>
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
                  <th> Autor </th>
                  <th> Editora </th>
                  <th> Ano de Publicação </th>
                </tr>
              </thead>
              <tbody>
                @if ($books != null)
                    @foreach ($books as $book)
                        <tr>
                            <td>{{$book->titulo}}</td>
                            <td>{{$book->autor}}</td>
                            <td>{{$book->editora}}</td>
                            <td>{{$book->ano_publicacao}}</td>
                        </tr>
                    @endforeach
                @else
                    
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      @include("modals.create")
</div>