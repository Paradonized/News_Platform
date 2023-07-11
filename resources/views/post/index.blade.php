@extends('layouts.app')

@section('title')
    {{$post['title']}}
@endsection

@php
    $tags = explode(",", $post->tags)
@endphp

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        <h5>Категории</h5>
        <div class="d-flex justify-content-start">
            @foreach ($post->tags as $tag)
                <p class="card-subtitle p-1 m text-muted">{{$tag->name}}</p>
            @endforeach
        </div>
    </div>

    <p>{{$post->content}}<p>
    <a href="/" class="btn btn-danger">Назад</a>
@endsection