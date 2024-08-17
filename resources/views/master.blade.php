<!doctype html>
<html lang="en" data-bs-theme="auto">
  @include('admin.inc.header')
  <body>
    @include('admin.inc.navbar')


<div class="container-fluid">
  <div class="row">
    @include('admin.inc.sidebar')

    @yield('content')

  </div>
</div>
@include('admin.inc.footer')
