<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferencePaymentDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reference_payment_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_id',
        'ref_no',
        'client',
        'abn',
        'contact',
        'department',
        'position',
        'email',
        'street',
        'suburb',
        'country',
        'phone',
        'mobile',
        'postcode',
        'client_abn',
    ];

    public function reference() {
        return $this->belongsTo(Reference::class, 'ref_id', 'id');
    }
}
