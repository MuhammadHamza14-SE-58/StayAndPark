<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class submitListing extends Model
{
    protected $fillable = [
        'userEmail','status','listingType','name','price','address','lat','long','phone','city','propertyType','rooms','baths','kitchen','wifi','iron','parking'
    ];

    public function images(){

        return $this->hasMany(\App\house_images::class);
    }
}


