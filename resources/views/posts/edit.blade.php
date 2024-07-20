@extends('master')

@section('title', $title ?? 'My Blog || UNE')

@section('content')
<header class="header">
    <h1>Edit Post</h1>
</header>

<main class="main-content">
            <section class="form-container">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status">
                            <option value="0" {{ old('status', $post->status) == '0' ? 'selected' : '' }}>Draft</option>
                            <option value="1" {{ old('status', $post->status) == '1' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-submit">Update Post</button>
                </form>
            </section>
        </main>
@endsection