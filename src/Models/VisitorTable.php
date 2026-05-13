<?php

namespace Vinod\VisitorTracking\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorTable extends Model
{
    protected $table = 'visitors';

    protected $fillable = [
        'ip',
        'session_id',
        'country',
        'region',
        'city',
        'device',
        'os',
        'browser',
        'page_title',
        'url',
        'referrer',
        'source',
        'visit_count',
        'page_views',
        'is_unique',
        'last_visit_at',
    ];
}
