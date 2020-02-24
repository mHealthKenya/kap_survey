<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthCareWorkers extends Model
{
    public $table = 'tbl_patientdetails';
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            
    ];
}
