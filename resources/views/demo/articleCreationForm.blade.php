@extends('master')

@section('title')
    New Article Form
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="laravel-red">New Article Form</h3>
            <form action="{{ url('demo/article') }}" method="POST" id="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-field">
                    <input id="title" name="title" type="text" class="validate">
                    <label for="title">Article Title</label>
                </div>
                <div class="input-field">
                    <textarea id="body" name="body" class="materialize-textarea validate"></textarea>
                    <label for="body">Article Body</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="$('.form').submit();">Submit
                    <i class="material-icons right">submit</i>
                </button>

            </form>
        </div>
    </div>
@endsection

@section('foot')
@endsection