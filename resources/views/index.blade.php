@extends('layouts.app')

@section('title')
    Новини
@endsection


@section('content')
    <h1>Новини</h1>
    <form action="/" class="form-inline">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Търсене на заглавие..." />
            <button button type="submit" class="btn btn-primary mb-2">Търси</button>
        </div>
    </form>
    <h4>Търсене по категория:</h4>
    <div class="d-flex flex-row justify-content-start">
        @foreach($tags as $tag)
            <a href="/?tag={{$tag->name}}" class="btn btn-light p-2 mb-2 ml-1 mr-1">{{$tag->name}}</a>
        @endforeach
        <a href="/" class="btn btn-light p-2 mb-2 ml-1 mr-1">Без категория</a>
    </div>
    @if(count($posts) == 0)
        <p>Няма новини.</p>
    @else
        <div>
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><a href="/post/{{$post['id']}}">{{$post->title}}</a></h3>
                        <div class="d-flex justify-content-start">
                            @foreach ($post->tags as $tag)
                                <h6 class="card-subtitle p-1 m text-muted">{{$tag->name}}</h6>
                            @endforeach
                        </div>
                        <p class="card-text text-truncate">{{$post->content}}</p>
                        <div class="btn-group" role="group">
                            <a href="/post/{{$post->id}}/edit" class="btn btn-primary mr-2">Редактирай</a>
                            <form method="POST" action="post/{{$post->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Изтрий новина</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <a href="/post/create" class="btn btn-success m-3">Добави новина</a>

@endsection