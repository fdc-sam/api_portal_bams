<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceLandlord extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reference_landlords';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'landlord',
        'landlord_centre_manager',
        'center_phone_area_code',
        'landlord_centre_manager_phone',
        'landlord_centre_manager_email',
        'center_mobile_area_code',
        'landlord_centre_manager_mobile',
        'landlord_leasing_manager',
        'leasing_phone_area_code',
        'landlord_leasing_manager_phone',
        'landlord_leasing_manager_email',
        'leasing_mobile_area_code',
        'landlord_leasing_manager_mobile',
        'landlord_design_manager',
        'landlord_design_manager_email',
        'design_phone_area_code',
        'landlord_design_manager_phone',
        'design_mobile_area_code',
        'landlord_design_manager_mobile',
        'landlord_tenancy_coordinator',
        'tenancy_phone_area_code',
        'landlord_tenancy_coordinator_phone',
        'landlord_tenancy_coordinator_email',
        'tenancy_mobile_area_code',
        'landlord_tenancy_coordinator_mobile',
        'landlord_facility_manager',
        'facility_phone_area_code',
        'landlord_facility_manager_phone',
        'landlord_facility_manager_email',
        'facility_mobile_area_code',
        'landlord_facility_manager_mobile',
        'landlord_security',
        'security_phone_area_code',
        'landlord_security_phone',
        'landlord_security_email',
        'security_mobile_area_code',
        'landlord_security_mobile'
        
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }
}
