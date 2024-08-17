@extends('master')

@section('title', $title ?? 'My Blog || UNE')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1 class="mt-4">Create New Post</h1>
    <section class="form-container">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status">
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </section>
</main>

@endsection
