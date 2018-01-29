@extends('site.main')
@section('css')
    <style>
        img{
            max-width: 100%;
            height: auto;
            display: block;
            border: 1px solid #eee;
            padding: 2px;
        }
        figure {
            position: relative;
            text-align: center;
            font-weight: 700;
            color: #999;
            background-color: #fff;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .caption {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 5px;
            font-size: 14px;
            line-height: 150%;
            font-weight: 700;
            color: #fff;
            z-index: 100;
            background-color: rgba(0,0,0,.8);
            -webkit-transition: all .3s ease-out;
            transition: all .3s ease-out;
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
            <div class="col-md-8 blogContainer">
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
@section('js')
    <script>
        $(document).ready(function(){
            $('.blogContainer img').each(function(){
                var alt =   $(this).attr('alt');
                $(this).wrap('<figure></figure>');
                var wrap = $('<figcaption class="caption">');
                wrap.append(alt);
                $(this).parent().append(wrap);
            });
        });
    </script>
@endsection
