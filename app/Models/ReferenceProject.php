<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceProject extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reference_projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'project',
        'project_contact',
        'project_phone_code',
        'project_phone',
        'project_email',
        'project_mobile_code',
        'project_mobile',
        'project_street',
        'project_suburb',
        'project_postcode',
        'project_state',
        'project_country',
        'project_loading_dock_details',
        'service_id',
        'operation',
        'bams_security_contact',
        'bams_security_email',
        'bams_security_mobile',
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }

}
