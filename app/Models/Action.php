<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Action extends Model
{
    protected $table = 'actions';

    protected $fillable = [
        'nom',
        'commentaire',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'autoriser',
            'id_action',
            'id_role'
        )->withTimestamps();
    }
}