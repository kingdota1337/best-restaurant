<?php

namespace App\Models\Supplies;

use App\Models\BaseModel;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supply extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'number'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'supply_product')->withPivot(['count', 'user_id']);
    }
}
