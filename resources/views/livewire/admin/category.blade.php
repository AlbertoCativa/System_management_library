<div>
    {{-- HEADER --}}
    <div class="page-header">
        <h3 class="page-title"> Gestão de Categorias </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <button  data-toggle="modal" data-target="#create_category" class="btn btn-primary">+ Adicionar</button>
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
                  <th> Categoria </th>
                  <th> Acções </th>
                </tr>
              </thead>
              <tbody>
                @if (isset($categories) and count($categories) > 0)
                    @foreach ($categories as $category)
                        <tr>
                            <td> {{ $category->description }} </td>
                            <td> Editar </td>
                        </tr>
                    @endforeach
                @else
                    
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @include("modals.category")
</div>