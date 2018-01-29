@extends('site.main')
@section('css')
    <style>
        img{
            max-width: 100%;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <h1>{{$post->title}}</h1>
        <div class="post_date">
            <i class="fa fa-clock"></i>
            {{dataMes($post->date)}}
        </div>
        <div class="row">
            <div class="col-md-8">
                {!! $post->content !!}
            </div>
            <div class="col-md-4">
                @foreach($posts as $p)
                    <div>
                        <a href="{{route('blog.see',$p->slug)}}">
                            <img class="img-responsive" src="{{$p->show_image}}" alt="">
                        </a>
                        <h3><a href="{{route('blog.see',$p->slug)}}">{{$p->title}}</a></h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
