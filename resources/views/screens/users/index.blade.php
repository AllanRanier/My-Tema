@extends('base')
@php $objects = $user @endphp

@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Listas de Usuário</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="card shadow mb-2">
                <div class="card-header bg-light">

                    <form action="{{ route('usuarios.query') }}" method="GET">
                        <div class="row mt-2">
                            <div class="col col-sm-4  col-md-3">
                                <select class="form-control" id="parametros" name="parametros">
                                    <option value="name">Nome</option>
                                    <option value="email">E-mail</option>
                                </select>
                            </div>
                            <div class="col col-sm-4 col-md-3">
                                <input type="texte" class="form-control" id="informacao"
                                    name="informacao" placeholder="Informe os dados da sua busca">
                            </div>
                            <div class="col col-sm-4  col-md-3 mt-1">
                                <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-search"></i>
                                    Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-primary" href="{{ url('/usuarios/create') }}">Novo Usuario</a>
                        </div>
                    </div>
                    <div class="table-responsive-md">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            @if (count($objects) > 0)
                                @foreach ($objects as $key => $object)
                                    <tr>
                                        <th>{{ $object->name }}</th>
                                        <td>{{ $object->email }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('usuarios.edit', ['id' => $object->id]) }}"><span class="text-500 fas fa-edit"></a>
                                            <a title="Excluir" onclick="javascript:confirm_delete('Deseja realmente excluir o registro do usuário: {{ $object->name }}, selecionado?', '{{ route('usuarios.destroy', ['id' => $object->id]) }}');" style="cursor:pointer"><span class="text-500 fas fa-trash-alt"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="12" class="text-center">Nenhum registro cadastrado!</th>
                                </tr>
                            @endif
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="row flex-between-end mt-3  justify-content-end">
                        <div class="col-auto align-self-right small mt-1">
                            <b>Total Registros:</b> Geral ({{ $objects->total() }}).
                        </div>
                        <div class="col-auto align-self-left">

                            <div class="pagination pagination-sm">
                                {{ $objects->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                        aria-labelledby="tab-dom-04c45e1b-d354-416b-80de-73a934cf53bc"
                        id="dom-04c45e1b-d354-416b-80de-73a934cf53bc">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-info me-1 mb-1">Atualizar</a>
                        <a href="javascript:history.back()" class="btn btn-sm btn-default me-1 mb-1">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
