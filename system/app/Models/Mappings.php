<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mappings extends Model
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
        'custom validation schema',
        'parent_id',
        'map type',
        'sort weight',
        'external id',
        'comment',
        'versioned_object_id',
        'mnemonic',
        'from_concept_id',
        'to_concept_id',
        'to_source_id',
        'from_source_id',
        'from concept code',
        'from concept name',
        'from source url',
        'from source version',
        'to concept code',
        'to concept name',
        'to source url',
        'to source version',
        'counted',
        'index'
    ];
}
