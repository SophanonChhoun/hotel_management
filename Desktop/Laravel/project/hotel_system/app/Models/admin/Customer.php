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
        // 'confirm_password',
        'phone_number',
        'dob',
        'gender',
        'identification_id',
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

    // public function setPasswordAttribute($confirm_password)
    // {
       
      
    // }

}
