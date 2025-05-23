<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security_company';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'company',
        'abn',
        'phone',
        'street',
        'suburb',
        'postcode',
        'state',
        'country',
        'division_id',
    ];
}
