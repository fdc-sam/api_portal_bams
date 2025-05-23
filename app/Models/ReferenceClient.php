<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceClient extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reference_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'client',
        'client_contact',
        'client_phone_code',
        'client_phone',
        'client_email',
        'client_mobile_code',
        'client_mobile',
        'client_street',
        'client_suburb',
        'client_postcode',
        'client_state',
        'client_country',
        'client_abn',
        'client_department',
        'client_position',
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }
}
