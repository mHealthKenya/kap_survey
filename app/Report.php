<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $table = 'survey_reports';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];
}
