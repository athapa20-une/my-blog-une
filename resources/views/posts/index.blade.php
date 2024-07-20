@extends('master')

@section('title', $title ?? 'My Blog || UNE')

@section('content')
<header class="header">
    <h1>Posts Listing</h1>
</header>
<main class="main-content">
<a href="{{ route('posts.create') }}" class="btn btn-edit">Add New</a>
<section class="table-container">
        <table class="listing-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>{{ $post->status == 1 ? 'Published' : 'Draft' }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-view">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                            </form>                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection