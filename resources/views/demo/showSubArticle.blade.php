@extends('master')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            @if($article)
                <h4 class="laravel-red">{{ $article->title }}</h4>
                <p>{{ $article->body }}</p>
                <p>
                    @if(count($article->article) > 0)
                        <a href="{{ url('demo/article/'.$article->article->id) }}">Related Article</a><br/>
                    @endif
                </p>
            @else
                <h4 class="laravel-red">No subarticle found!</h4>
                <p>Looks like that id points to nothing.</p>
            @endif
        </div>
    </div>
@endsection

@section('foot')
@endsection