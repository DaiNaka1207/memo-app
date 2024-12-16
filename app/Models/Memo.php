<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Memo extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'subject', 'content'];

    protected static function booted(): void
    {
        static::addGlobalScope('auth', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}
