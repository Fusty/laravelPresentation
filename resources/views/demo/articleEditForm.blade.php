@extends('master')

@section('title')
    Article Edit Form
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="laravel-red">Edit Article Form</h3>
            <form action="{{ url('demo/article/'.$article->id) }}" method="POST" id="form">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-field">
                    <input id="title" name="title" type="text" class="validate" value="{{ $article->title or '' }}">
                    <label for="title">Article Title</label>
                </div>
                <div class="input-field">
                    <textarea id="body" name="body" class="materialize-textarea validate">{{ $article->body or '' }}</textarea>
                    <label for="body">Article Body</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="$('.form').submit();">Submit
                    <i class="material-icons right">save</i>
                </button>
            </form>
        </div>
    </div>
@endsection

@section('foot')
@endsection