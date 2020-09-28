@extends('layouts.dashboa')

@section('titulo')
ALP-LEARNING
@endsection

@section('content')

    <h2>Publicación</h2>
    <div class="card">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            {{ $post->body }}
        </div>
    </div>

    <br><br>

    <h2>Comentarios</h2>
    @foreach ($comments as $comment)
        <div class="card">
        @if($comment->postId == $id)
            <div class="card-header">
            {{ $comment->body }}
            </div>
        @endif
        </div>
    @endforeach

@endsection

@section('footer')
    @include('layouts.footer')
@endsection