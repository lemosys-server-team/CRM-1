<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'dateofbirth', 'blood_group', 'marrige_anniversary','country_id','city_id','notification_type','gender'
    ];

    /**
     * Get the country information that belong to this user.
    */
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    /**
     * Get the city information that belong to this user.
    */
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
