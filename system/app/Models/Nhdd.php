<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'public_access',
        'created_at',
        'updated_at',
        'created_by_id',
        'updated_by_id',
        'is active',
        'extras',
        'uri',
        'version',
        'released',
        'retired',
        'is_latest_version',
        'name',
        'full_name',
        'default_locale',
        'supported_locale',
        'website',
        'description',
        'external_id',
        'concept_class',
        'datatype',
        'comment',
        'parent_id',
        'versioned_object_id',
        'mnemonic',
        'counted',
        'index'
    ];
}
