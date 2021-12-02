@extends('base')
@php $objects = @$users @endphp


@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cadastro de Alunos</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="col-md-6">
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <form action="{{ !@$objects ? route('usuarios.store') : route('usuarios.update', ['id' => @$objects->id]) }}" method="POST">
                            @csrf
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Nome:</label>
                                        <input @php $inputVar = 'name' @endphp type="text" class="form-control"
                                            id="{{ $inputVar }} " name="{{ $inputVar }}"
                                            value="{{ @$objects[$inputVar] ?? old($inputVar) }}" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Email:</label>
                                        <input @php $inputVar = 'email' @endphp type="email" class="form-control"
                                            id="{{ $inputVar }}" name="{{ $inputVar }}"
                                            value="{{ @$objects[$inputVar] ?? old($inputVar) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                @if ($objects ?? '')

                                @else
                                    <div class="col">
                                        <div class="form-group">
                                            <label><span style="color: red">*</span> Senha:</label>
                                            <input @php $inputVar = 'password' @endphp type="password" class="form-control"
                                                id="{{ $inputVar }}" name="{{ $inputVar }}"
                                                value="{{ @$objects[$inputVar] ?? old($inputVar) }}" required>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label title="Administrador">Administrador: </label>
                                        <div class="form-check form-check-inline">
                                            <input @php $inputVar = 'is_admin' @endphp class="form-check-input" id="{{ $inputVar }}1"
                                                type="radio" name="{{ $inputVar }}" value="1"
                                                @if (@$object[$inputVar] == 1 ?? old($inputVar) == 1) checked @endif />
                                            <label class="form-check-label" for="{{ $inputVar }}1">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input @php $inputVar = 'is_admin' @endphp class="form-check-input" id="{{ $inputVar }}2"
                                                type="radio" name="{{ $inputVar }}" value="0"
                                                @if (@$object[$inputVar] == 0 ?? old($inputVar) == 0) checked @endif />
                                            <label class="form-check-label" for="{{ $inputVar }}2">Não</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2" role="tabpanel">
                                <button type="submit" class="btn btn-sm btn-success me-1 mb-1">Salvar</button>
                                <a href="{{ url('/usuarios/index') }}"
                                    class="btn btn-sm btn-default me-1 mb-1">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('inject_scripts')
    @include('screens.users.script')
@endsection
