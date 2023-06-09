<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    /**
     * @var bool|mixed|string
     */
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

    public function referredFacility()
    {
        return $this->belongsTo(Facility::class, 'referredFacility');
    }
}
