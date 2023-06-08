<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFacility extends Model
{
    use HasFactory;

    protected $table = 'facility_user'; // Specify the join table name if it deviates from the naming convention
    protected $fillable = ['user_id', 'facility_id']; // Define the fillable columns

    // Define the relationships with User and Facility models
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facility()
    {
        return $this->belongsTo(m_f_l_s::class);
    }
}
