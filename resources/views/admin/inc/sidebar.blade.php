<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">My Blog - Assignment 2</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ url('/dashboard') }}">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            @if(Auth::user()->hasPermission('Posts','Show') )
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('posts') }}">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Posts
            </a>
            @endif
            @if(Auth::user()->hasPermission('Posts','Add') )
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('posts/create') }}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Add Posts
              </a>
          </li>
          @endif
          @if(Auth::user()->hasPermission('Users','Show') )
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('users') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Users
            </a>
            @endif
            @if(Auth::user()->hasPermission('Users','Add') )
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('users/create') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Add Users
            </a>
            @endif
          </li>
        </ul>


        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2"  class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                {{ __('Sign out') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            {{-- <a class="nav-link d-flex align-items-center gap-2" href="{{ url('logout') }}">
              <svg class="bi"><use xlink:href="#door-closed"/></svg>
              Sign out
            </a> --}}
          </li>
        </ul>
      </div>
    </div>
  </div>