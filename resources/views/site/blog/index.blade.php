@extends('site.main')
@section('css')
    <style>
        .img-featured{
            max-width: 100%;
            max-height: 220px;
            height: auto;
            width: auto;
            display: block;
            border: 1px solid #eee;
            padding: 2px;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <h1>{{$title}}</h1>
        @foreach($posts->chunk(3) as $post)
            <div class="row">
                @foreach($post as $p)
                    <div class="col-md-4">
                        <a href="{{route('blog.see',$p->slug)}}">
                            <img src="{{$p->show_image}}" alt="{{$p->title}}" class="img-featured">
                        </a>
                        <span>{{dataMes($p->date)}}</span>
                        <h3>{{$p->title}}</h3>
                        <a href="#">Read More<i class="fas fa-angle-right"></i></a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
