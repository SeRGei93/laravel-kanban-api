<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use MoonShine\Laravel\Models\MoonshineUser;

class User extends MoonshineUser
{
    use HasApiTokens;

    protected $table = 'moonshine_users';

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class, 'moonshine_user_id', 'id');
    }
}
