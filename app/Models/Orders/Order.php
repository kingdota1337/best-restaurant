<?php

namespace App\Models\Orders;

use App\Models\BaseModel;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'number'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['count', 'user_id']);
    }
}
