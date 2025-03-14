<div>
    {{-- HEADER --}}
    <div class="page-header">
        <h3 class="page-title"> Gestão de Leitores </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <button  data-toggle="modal" data-target="#reader" class="btn btn-primary">+ Adicionar</button>
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
                  <th> Nº Leitor </th>
                  <th> Nome </th>
                  <th> Email </th>
                  <th> Curso </th>
                  <th> Turno </th>
                  <th> Ano </th>
                </tr>
              </thead>
              <tbody>
                @if (isset($leitors) and count($leitors) > 0)
                  @foreach ($leitors as $leitor)
                    <tr>
                      <td>{{$leitor->number}}</td>
                      <td>{{$leitor->nome}}</td>
                      <td>{{$leitor->email}}</td>
                      <td>{{$leitor->curso}}</td>
                      <td>{{$leitor->period}}</td>
                      <td>{{$leitor->level}}</td>
                    </tr>
                  @endforeach
                @else
                    
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      @include("modals.reader")
</div>