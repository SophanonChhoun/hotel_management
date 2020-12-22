<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'first_name',
        'last_name',
        'password',
        'gender',
        'phone_number',
        'address',
        'is_enable',
        'media_id'
    ];

    protected $hidden = [
        'password',
        'media_id',
    ];

    /**
     * Encrypt password field.
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        if ($password !== null & $password !== '') {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
}
