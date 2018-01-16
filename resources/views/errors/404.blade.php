@extends('.site.main')
@section('content')

    <div class="content" style="width: 50%;position:absolute;top:35%;left:25%;">
        <div class="row">
            <div class="col-md-12">
                <div style="font-size: 18px; margin-bottom: 40px;" class="alert alert-danger text-center">Error HTTP 404 - Page or Resource Not Found</div>

                @if(isset($message))
                    <h3 class="text-center alert alert-info">{{ $message }}</h3>
                @endif
                <br />
                <p style="text-align: center;">
                    <a class="btn btn-lg btn-warning" href="javascript:window.history.back();">Click here to return to the start page</a>
                </p>
            </div>
        </div>
    </div>

@endsection