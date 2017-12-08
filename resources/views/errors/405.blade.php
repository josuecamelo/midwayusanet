@extends('.site.main')
@section('main')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div style="font-size: 18px;" class="alert-danger text-center">Recurso Desativado.</div>

                @if(isset($message))
                    <h3 class="text-center alert-info">Caso necessite de acesso, solicite liberação da Url: /{{ $message }}</h3>
                @endif
                <br />
                <p style="text-align: center;">
                    <a class="btn btn-lg btn-info" href="javascript:window.history.back();">Clique para Retornar a Página Inicial</a>
                </p>
            </div>
        </div>
    </div>
@endsection