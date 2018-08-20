<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class house_images extends Model
{
    protected $fillable = [
        'path',"house_id"
    ];
    public function house(){

        $this->belongsTo(\App\submitListing::class);
    }
}