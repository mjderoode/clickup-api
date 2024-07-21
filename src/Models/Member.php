<?php

namespace Mjderoode\ClickupApi\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;

    protected $primaryKey = null;

    public $incrementing = false;

    public $fillable = [
        'api_id',
        'username',
        'email',
        'color',
        'profilePicture',
        'initials',
        'role',
        'custom_role',
        'last_active',
        'date_joined',
        'date_invited',
    ];
}
