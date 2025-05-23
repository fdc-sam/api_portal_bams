<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'references';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ref_no',
        'completed_by',
        'completed_date',
        'folder',
        'is_archived',
        'status',
        'custom_status',
        'templatedivision',
        'division_id',
        'time',
        'project_manager_contact',
        'project_manager_email',
        'project_manager_mobile',
    ];

    public function project() {
        return $this->hasOne(ReferenceProject::class, 'ref_id', 'id');
    }

    public function client() {
        return $this->hasOne(ReferenceClient::class, 'ref_id', 'id');
    }

    public function referenceClientRep() {
        return $this->hasOne(ReferenceClient::class, 'ref_id', 'id');
    }

    public function referencePaymentDetail() {
        return $this->hasOne(ReferenceClient::class, 'ref_id', 'id');
    }

    public function referenceLandlord() {
        return $this->hasOne(ReferenceClient::class, 'ref_id', 'id');
    }

    public function referenceSpecialNote() {
        return $this->hasOne(ReferenceClient::class, 'ref_id', 'id');
    }

    public function referenceEngineer() {
        return $this->hasOne(ReferenceClient::class, 'ref_id', 'id');
    }

}
