<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
    public $table = 'tbl_sub_county';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'time_stamp', 'status', 'county_id',
    ];

    public function county() {
        return $this->belongsTo('App\County','county_id','id');
    }
}
