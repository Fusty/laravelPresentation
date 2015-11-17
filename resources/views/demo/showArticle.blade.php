@extends('master')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            @if($article)
                <br/>
                <h4 class="laravel-red">{{ $article->title }}</h4>
                <p>{{ $article->body }}</p>
                <p>
                    @if(count($article->subArticle) > 0)
                        <a href="{{ url('demo/subArticle/'.$article->subArticle->id) }}">Related SubArticle</a><br/>
                    @endif
                    Associated Users:
                    @forelse($article->users as $user)
                        {{ $user->name }},
                    @empty
                        None
                    @endforelse
                </p>
            @else
                <h4 class="laravel-red">No article found!</h4>
                <p>Looks like that id points to nothing.</p>
            @endif
        </div>
    </div>
@endsection

@section('foot')
@endsection