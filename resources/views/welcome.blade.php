@extends('layouts.template')

@section('content')
<title>Home</title>
<img src="{{ asset('images/Banner.png') }}" class="img-fluid pt-2" alt="Banner">

<div class="row">
    <div class="col-12">
        <h1 class="py-3 text-center">Publicações</h1>
    </div>
</div>
<div class="row pb-5">
    @foreach ($posts as $post)
    <div class="col-md-4 pb-4 text-center">
        <div class="card h-100 card-hover">
            @php
            $tmp = "images/{$post->filename}";
            @endphp
            <img src="{{ asset( $tmp ) }}" class="card-img-top" alt="{{ $post->titulo }}" style="max-height: 250px !important">
            <div class="card-body shadow">
                <h5 class="card-title">{{ $post->titulo }}</h5>
                <p class="card-text">{{ $post->descricao_breve }}</p>
                <a href="{{ route('restaurante', $post->slug) }}" class="btn btn-custom" target="_blank">Saiba Mais <i
                        class="fas fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
