@extends('layouts.admintemplate')

@section('content')
{{-- {{ dd() }} --}}
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Editar Postagem</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('painel.post_update_usuarios') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="name" value="{{ $users->name }}">
                            <input type="hidden" class="form-control" name="id" value="{{ $users->id }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail:</label>
                            <input type="text" class="form-control" name="email" value="{{ $users->email }}">
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Perfil:</label>
                                <select class="form-select" name="role">
                                    <option>Selecione....</option>
                                    @foreach(App\Models\Role::get() as $role)
                                        <option value="{{$role->name}}" {{ $users->hasRole($role->name) ? 'selected' : '' }}>{{$role->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success rounded">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
