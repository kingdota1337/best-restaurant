<?php

namespace App\Models\Products;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'sub_type_id',
        'sugar',
        'calories',
        'color',
        'multiplicity',
        'gasification'
    ];

    protected function color(): Attribute  
    {
        return Attribute::make(
            set: fn (array $value) => json_encode($value),
            get: fn (string $value) => json_decode($value),
        );
    }
}
