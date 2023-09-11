<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = ['county_name'];

    public function subcounties()
    {
        return $this->hasMany(Subcounty::class);
    }
}
