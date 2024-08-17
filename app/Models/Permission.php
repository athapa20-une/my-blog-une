<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $collection = 'permissions'; // MongoDB collection name

    protected $fillable = ['name', 'description'];
}
