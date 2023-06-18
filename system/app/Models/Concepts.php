<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepts extends Model
{
    use HasFactory;

    protected $fillable = [
        'checksums',
        'id',
        'public access',
        'created at',
        'updated at',
        'created_by_id',
        'updated_by_id',
        'is active',
        'extras',
        'uri',
        'version',
        'released',
        'retired',
        'is latest version',
        'external id',
        'concept class',
        'datatype',
        'comment',
        'parent_id',
        'versioned_object_id',
        'mnemonic',
        'counted',
        'index'
    ];
}
