<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceEngineer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reference_engineers';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'engineer',
        'engineer_contact',
        'engineer_phone_code',
        'engineer_phone',
        'engineer_email',
        'engineer_mobile_code',
        'engineer_mobile',
        'engineer_street',
        'designer_phone',
        'designer_email',
        'engineer_suburb',
        'engineer_postcode',
        'engineer_state',
        'engineer_country',
        'certifier',
        'certifier_contact',
        'certifier_phone_code',
        'certifier_phone',
        'certifier_email',
        'certifer_mobile_code',
        'certifier_mobile',
        'certifier_street',
        'certifier_suburb',
        'certifier_postcode',
        'certifier_state',
        'certifier_country',
        'council',
        'council_contact',
        'councial_phone_code',
        'council_phone',
        'council_email',
        'council_mobile_code',
        'council_mobile',
        'council_street',
        'council_suburb',
        'council_postcode',
        'council_state',
        'council_country',
        'bams_project_manager_contact',
        'bams_project_manager_email',
        'project_area_code',
        'bams_project_manager_mobile',
        'bams_site_manager_contact',
        'bams_site_manager_email',
        'site_area_code',
        'bams_site_manager_mobile',
        
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }
}
