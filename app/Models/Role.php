<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $collection = 'roles'; // MongoDB collection name

    protected $fillable = ['name', 'description'];

}
