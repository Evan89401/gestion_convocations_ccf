<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'roles';

    public function utilisateurs(): HasMany
    {
        return $this->hasMany(
            Utilisateur::class,
            'id_role',
            'id'
        );
    }

    public function actions(): BelongsToMany
    {
        return $this->belongsToMany(
            Action::class,
            'autoriser',
            'id_role',
            'id_action'
        )->withTimestamps();
    }
}