<?php

namespace Mjderoode\ClickupApi\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    protected $primaryKey = null;

    public $incrementing = false;

    protected function casts(): array
    {
        return [
            'members' => 'collection',
        ];
    }

    public $fillable = [
        'api_id',
        'name',
        'color',
        'avatar',
        'members',
    ];
}
