@extends('master')

@section('title')
    Article Browser
@endsection

@section('head')
    <style>
        .article-snippet {
            max-width:400px;
            text-overflow:ellipsis;
            overflow:hidden;
            white-space:nowrap;
            color:#757575;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h4>Article Browser</h4>
            <ul>
                @forelse($articles as $article)
                    <li>
                        <a href="{{ url('demo/article/'.$article->id) }}">{{ $article->title }}
                            <p class="article-snippet ">{{ $article->body }}</p>
                        </a>
                    </li>
                @empty
                    <li>No Articles Found!</li>
                @endforelse
            </ul>
            {!! str_replace('/?', '?', $articles->render()) !!}
        </div>
    </div>
@endsection

@section('foot')
@endsection