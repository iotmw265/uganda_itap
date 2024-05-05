<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCentresMotion extends Model
{
    protected $table = 'data_centres_motion';

    public $timestamps = false;

    protected $guarded = [
        'id',
        'created_at',
    ];
}