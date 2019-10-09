<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public $table = 'tbl_master_facility';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    public function sub_county() {
        return $this->belongsTo('App\SubCounty','Sub_County_ID','id');
    }
}
