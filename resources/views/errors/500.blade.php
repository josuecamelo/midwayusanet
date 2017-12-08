@extends('.site.main')
@section('content')

    <div class="content" style="width: 50%;position:absolute;top:35%;left:25%;">
        <div class="row">
            <div class="col-md-12">
                <div style="font-size: 18px; margin-bottom: 40px;" class="alert alert-danger text-center">Error HTTP 500 Internal Server Error</div>

                @if(isset($message))
                    <p class="text-center alert alert-warning">{{ isset($file) ? 'File: ' .$file : null  }}{{isset($line) ? ' - Line: ' .$line.' - ' : null}}{{ $message }}</p>
                @endif

                <br />
                <p style="text-align: center;">
                    <a class="btn btn-lg btn-warning" href="javascript:window.history.back();">Click here to return to the start page</a>
                </p>
            </div>
        </div>
    </div>

@endsection