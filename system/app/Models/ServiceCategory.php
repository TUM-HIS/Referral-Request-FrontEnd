<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_categories';

    protected $fillable = [
        'id',
        'name',
        'abbreviation',
        'active',
        'created',
        'created_by',
        'deleted',
        'description',
        'parent',
        'search',
        'updated',
        'updated_by',
    ];
}
