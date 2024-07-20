@extends('master')

@section('content')
<header class="header">
    <h1>Post Details</h1>
</header>
<main class="main-content">
    <section class="post-details">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Status: {{ $post->status == 1 ? 'Published' : 'Draft' }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-back">Back to List</a>
    </section>
</main>
@endsection
