<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'definition',
        'basedOn',
        'replaces',
        'groupIdentifier',
        'status',
        'intent',
        'type',
        'priority',
        'serviceRequested',
        'subject',
        'context',
        'occurrence',
        'authoredOn',
        'requester',
        'specialty',
        'recipient',
        'reasonCode',
        'reasonReference',
        'description',
        'supportingInfo',
        'note',
        'relevantHistory'
    ];
}
