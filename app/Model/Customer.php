<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $casts = [
        'banks' => 'json',
    ];

    protected $fillable = [
        'code',
        'name',
        'type',
        'address',
        'phone',
        'fax',
        'email',
        'tax',
        'website',
        'liability',
        'note',
        'banks',
        'user_name_contact',
        'user_phone_contact',
        'user_email_contact',
        'customer_group_id',
    ];

    public function customerGroup()
    {
        return $this->belongsTo(CustomerGroup::class);
    }
}