<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCentresHum extends Model
{
    protected $table = 'data_centres_humi';

    public $timestamps = false;

    protected $guarded = [
        'id',
        'created_at',
    ];
}
