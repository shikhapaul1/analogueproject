<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'class_id';
    public $incrementing = true;  // For non-incrementing primary keys (e.g., UUIDs)
}
