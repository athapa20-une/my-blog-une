@extends('master')

@section('content')
<header class="header">
    <h1>Posts Listing</h1>
</header>
<main class="main-content">
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
                <@foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>{{ $post->status == 1 ? 'Published' : 'Draft' }}</td>
                        <td>
                            <a href="#" class="btn btn-edit">Edit</a>
                            <a href="#" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection