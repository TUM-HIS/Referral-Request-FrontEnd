<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'description',
        'location_desc',
        'number_of_beds',
        'number_of_cots',
        'open_whole_day',
        'open_whole_week',
        'facility_type',
        'operation_status',
        'ward',
        'owner',
        'officer_in_charge',
        'physical_address',
        'parent'
    ];
}
