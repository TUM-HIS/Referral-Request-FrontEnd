<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientName',
        'clientUPI',
        'referringOfficer',
        'referredFacility',
        'historyInvestigation',
        'diagnosis',
        'reasonReferral',
        'attachments',
        'additionalNotes',
        'priorityLevel',
        'serviceCategory',
        'service',
        'distance',
        'serviceNotes',
        'referralId',
        'submitReferral'
    ];


    public function facilityReffered()
    {
        return $this->belongsTo(m_f_l_s::class, 'referredFacility', 'Code');
    }

    public function facilityReffering()
    {
        return $this->belongsTo(m_f_l_s::class, 'referringFacility', 'Code');
    }

    public function patientReffered()
    {
        return $this->belongsTo(Patient::class, 'clientUPI', 'upi');
    }
}
