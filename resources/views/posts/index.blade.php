@extends('master')

@section('title', $title ?? 'My Blog || UNE')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <a class="btn btn-primary" href="{{ route('posts.create') }}" class="btn btn-edit">Add New</a>

    <h1>Posts Listing</h1>
    <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
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
    </div>
</main> 
@endsection