<?php

use App\Models\User;
use App\Models\Supplies\Supply;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supply_product', function (Blueprint $table) {
            $supplyForeign = $table->foreignIdFor(Supply::class);
            $productForeign = $table->foreignIdFor(Product::class);
            $userForeign = $table->foreignIdFor(User::class);

            $table->primary([$supplyForeign->name, $productForeign->name, $userForeign->name]);
            $supplyForeign->constrained();
            $productForeign->constrained();
            $userForeign->constrained();
            $table->unsignedInteger('count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_product');
    }
};
