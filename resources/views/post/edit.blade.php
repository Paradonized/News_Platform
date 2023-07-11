@extends('layouts.app')

@section('title')
    Редакция:{{$post->title}}
@endsection

@section('content')
    <h1>Редакция: {{$post->title}}</h1>
    <form method="POST" action="/post/{{$post->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Заглавие</label>
            <input type="text" name="title" class="form-control" placeholder="Добави заглавие..." value="{{$post->title}}" />
            <small class="text-muted">
                Задължително за попълване.
            </small>
            @error('title')
                <p>{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Категории:</label>
            <select id="tags" name="tags[]" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id}}" @selected($post->tags->contains($tag->id))>{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="content">Съдържание</label>
            <textarea type="text" name="content" class="form-control" placeholder="Добави съдържание..." rows="3">{{$post->content}}</textarea>
            <small class="text-muted">
                Задължително за попълване.
            </small>
            @error('content')
                <p>{{$message}}</p>
            @enderror
        </div>

        <button class="btn btn-success ml-3 mr-3 mt-1 mb-1">Запази промените</button>
        <br />
    </form>
    <a href="/" class="btn btn-danger ml-3 mr-3 mt-1 mb-1">Назад</a>
@endsection