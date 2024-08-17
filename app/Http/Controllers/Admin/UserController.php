<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get(); // Eager load roles
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // Get all roles
        $modules = Module::get(); // Get all modules with their permissions
        $permissions = Permission::get(); // Get all modules with their permissions

        return view('users.create', compact('roles', 'modules', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required',
            'permissions' => 'array',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Attach the role to the user
        DB::table('role_user')->insert([
            'role_id' => $request->role_id,
            'user_id' => $user->id,
        ]);        

        // If permissions are provided, attach them
        if ($request->permissions) {
            $role = Role::find($request->role_id);
            foreach ($request->permissions as $module_id => $permission) {
                foreach ($permission as $permissionId) {
                    DB::table('role_permission')->insert([
                        'role_id' => $request->role_id,
                        'user_id' => $user->id, // Use the ID of the logged-in user
                        'module_id' => $module_id,
                        'permission_id' => $permissionId,
                    ]);
                }
            }
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all(); // Get all roles
        $modules = Module::get(); // Get all modules with their permissions
        $permissions = Permission::get(); // Get all modules with their permissions
        $userRole = DB::table('role_user')->where('user_id', $user->id)->first(); // Assuming a user has one role
        // dd($userRole['role_id']);

        $userPermissions = DB::table('role_permission')
            ->where('role_id', $userRole['role_id'])
            ->get()
            ->groupBy('module_id')
            ->map(function ($permissions) {
                return $permissions->pluck('permission_id')->toArray();
            })
            ->toArray();

        // dd($userPermissions); // This will give you the structured array of module-wise permissions



        return view('users.edit', compact('user', 'roles', 'modules', 'permissions', 'userRole', 'userPermissions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'role_id' => 'required',
            'permissions' => 'array',
        ]);

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Attach the role to the user
        DB::table('role_user')->update([
            'role_id' => $request->role_id,
            'user_id' => $user->id,
        ]); 

        DB::table('role_permission')->where('role_id',$request->role_id)->delete();

        // If permissions are provided, attach them
        if ($request->permissions) {
            $role = Role::find($request->role_id);
            foreach ($request->permissions as $module_id => $permission) {
                foreach ($permission as $permissionId) {
                    DB::table('role_permission')->insert([
                        'role_id' => $request->role_id,
                        'user_id' => $user->id, // Use the ID of the logged-in user
                        'module_id' => $module_id,
                        'permission_id' => $permissionId,
                    ]);
                }
            }
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
