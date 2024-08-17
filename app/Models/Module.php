<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $collection = 'modules'; // MongoDB collection name

    protected $fillable = ['name', 'description'];
}
