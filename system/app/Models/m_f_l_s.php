<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class m_f_l_s extends Model
{
    use HasFactory, Notifiable;



//    public function routeNotificationFor($notification)
//    {
//        // Customize this logic to return the desired routing information
//        return $this->Code;
//    }

    protected $primaryKey = 'Code';

    protected $fillable = [
        'Code',
        'Officialname',
        'Province',
        'County',
        'Sub county',
        'Ward',
        'Facility type',
        'Owner type',
        'Constituency',
        'Open_whole_day',
        'Open_weekends',
        'Operation status',
        'ANC',
        'ART',
        'BEOC',
        'BLOOD',
        'CAES SEC',
        'CEOC',
        'C-IMCI',
        'EPI',
        'FP',
        'GROWM',
        'HBC',
        'HCT',
        'IPD',
        'OPD',
        'OUTREACH',
        'PMTCT',
        'RAD/XRAY',
        'RHTC/RHDC',
        'TB DIAG',
        'TB LABS',
        'TB TREAT',
        'YOUTH'
    ];
}
