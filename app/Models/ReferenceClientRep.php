<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceClientRep extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reference_client_reps';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'client_rep',
        'client_rep_contact',
        'client_recp_phone_code',
        'client_rep_phone',
        'client_rep_email',
        'client_recp_mobile_code',
        'client_rep_mobile',
        'client_rep_street',
        'client_rep_suburb',
        'client_rep_postcode',
        'client_rep_state',
        'client_rep_country'
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }
}
