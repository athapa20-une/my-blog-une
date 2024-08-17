<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Laravel\Eloquent\Casts\ObjectId;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRole()
    {
        // Get the user ID of the currently authenticated user
        $userId = Auth::id();

        // Retrieve the role name using a join between role_user and roles tables
        $roleName = DB::table('role_user')->where('user_id',$userId)->first();
        $role = Role::where('_id',$roleName['role_id'])->pluck('name')->first();

        // dd($role);

        return $role;
    }

    public function hasPermission($moduleName, $permissionName)
    {
        // Get the user ID of the currently authenticated user
        $userId = Auth::id();

        // Retrieve the role associated with the user
        $roleName = DB::table('role_user')->where('user_id', $userId)->first();
        $roleId = $roleName['role_id'];

        // Get the module ID based on the module name
        $moduleId = DB::table('modules')
            ->where('name', $moduleName)
            ->pluck('_id')
            ->first();
        $moduleId = (string) $moduleId; // Convert ObjectId to string


        // Get the permission ID based on the permission name
        $permissionId = DB::table('permissions')
            ->where('name', $permissionName)
            ->pluck('_id')
            ->first();

        $permissionId = (string) $permissionId; // Convert ObjectId to string

        $permissionExists = DB::table('role_permission')
            ->where('role_id', $roleId)
            ->where('module_id', $moduleId)
            ->where('permission_id', $permissionId)
            ->exists();

        return $permissionExists;
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', '_id'); // Adjust '_id' if using MongoDB
    }
}
