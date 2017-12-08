@extends('admin.main')

@section('css')
    <style>
        .color
        {
            border-radius: 3px;
            color: #fff;
            padding: 1px 3px;
        }
    </style>
@endsection

@section('main')
    <div class="container-fluid">
        <table class="table table-striped table-responsive table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td><a href="{{ route('permissoes.editar', $user->id)  }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $users->render() !!}
    </div>
@endsection