@extends('master')

@section('title', $title ?? 'Edit User || UNE')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <header class="mb-4">
        <h1>Edit User</h1>
    </header>

    <section class="form-container">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password (leave blank to keep current password):</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select class="form-select" id="role" name="role_id" required>
                    <option value="" disabled>Select a role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $userRole['role_id'] == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <h5>Permissions</h5>
                @foreach($modules as $module)
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $module->name }}
                        </div>
                        <div class="card-body">
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="permissions[{{ $module->id }}][]" 
                                           value="{{ $permission->id }}" 
                                           id="permission_{{ $permission->id }}"
                                           {{ isset($userPermissions[$module->id]) && in_array($permission->id, $userPermissions[$module->id]) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                @error('permissions')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </section>
</main>
@endsection
