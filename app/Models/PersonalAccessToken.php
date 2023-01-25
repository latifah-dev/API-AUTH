<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Laravel\Sanctum\Sanctum;
 
class PersonalAccessToken extends SanctumPersonalAccessToken
{
    // ...
    protected static function boot()
        {
            Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        }
}