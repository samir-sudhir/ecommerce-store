<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    protected $fillable = [
        'method', 'url', 'request_data', 'status_code', 'response_data'
    ];
}
