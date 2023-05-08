<?php

namespace App\Models;

use App\Models\Scopes\OrderScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory;

    /**
    * The "booted" method of the model.
    */
    protected static function booted(): void
    {
        static::addGlobalScope(new OrderScope);
    } 
}