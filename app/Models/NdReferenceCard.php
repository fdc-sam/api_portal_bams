<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NdReferenceCard extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nd_reference_cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'special_notes',
        'special_notes_start_date',
        'special_notes_finish_date',
        'special_notes_open_date',
        'special_notes_trading_hours',
        'designer',
        'designer_contact',
        'desginer_phone_code',
        'designer_phone',
        'designer_email',
        'designer_mobile_code',
        'designer_mobile',
        'designer_street',
        'designer_suburb',
        'designer_postcode',
        'designer_state',
        'designer_country',
        
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }
}
