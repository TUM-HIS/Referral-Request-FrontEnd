<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $fillable = [
        'id',
        'name',
        'abbreviation',
        'active',
        'category',
        'category_name',
        'code',
        'created',
        'created_by',
        'deleted',
        'description',
        'group',
        'has_options',
        'keph_level',
        'search',
        'updated',
        'updated_by',
    ];
}
