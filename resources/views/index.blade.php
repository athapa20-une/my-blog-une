@extends('master')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <header class="header">
        <h1>Dashboard</h1>
    </header>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif
    <section class="content user-info">
        <h2>Welcome to the My Basic Crud Blog - UNE</h2>
        <p>Logged In as:</p>
        <ul>
            <li>Name: {{ Auth::user()->name }}</li>
            <li>Email: {{ Auth::user()->email }}</li>
            <li>Role: {{ Auth::user()->getRole() }}</li>
        </ul>
        <p>You can add, edit, and manage your content.</p>
    </section>

</main>
@endsection