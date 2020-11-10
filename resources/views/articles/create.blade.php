@extends('layout')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">noo article</h1>
        <form method="POST" action="/articles">
            @csrf
            <div class="field">
                <label class="label" for="title">title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title">
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt"></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body"></textarea>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection('content')