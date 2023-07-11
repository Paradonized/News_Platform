@extends('layouts.app')

@section('title')
    Създай новина
@endsection

@section('content')
    <h1>Създай новина</h1>
    <form method="POST" action="/post" enctype="multipatr/form-data">
        @csrf 
        <label for="title">Заглавие</label>
        <input type="text" name="title" class="form-control" placeholder="Добави заглавие..." value="{{old('title')}}" />
        <small class="text-muted">
            Задължително за попълване.
        </small>
        @error('title')
            <p>{{$message}}</p>
        @enderror
        <br />
        
        <label for="tags">Категории:</label>
        <select id="tags" name="tags[]" class="form-control" multiple>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
        <br />

        <label for="content">Съдържание</label>
        <textarea type="text" name="content" class="form-control" placeholder="Добави съдържание..." value="{{old('content')}}"></textarea>
        <small class="text-muted">
            Задължително за попълване.
        </small>
        @error('content')
            <p>{{$message}}</p>
        @enderror
        <br />

        <button class="btn btn-success ml-3 mr-3 mt-1 mb-1">Създай новина</button>
        <br />
    </form>
    <a class="btn btn-danger ml-3 mr-3 mt-1 mb-1" href="/">Назад</a>
@endsection