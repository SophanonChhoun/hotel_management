<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'dob',
        'gender',
        'identification_id',
        'identification_type_id',
        'street_address',
        'city',
        'country',
        'zip',
        'is_enable',
      ];

      protected $hidden = [
       'password',  'remember_token',
    ];


    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);

    }

    public function identification_type()
    {
        return $this->belongsTo(IdentificationType::class,"identification_type_id","id");
    }

    // public function setPasswordAttribute($confirm_password)
    // {


    // }

}
