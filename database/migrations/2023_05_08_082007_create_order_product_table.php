<?php

use App\Models\User;
use App\Models\Orders\Order;

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
       
        Schema::create('order_product', function (Blueprint $table) {
            $orderForeign = $table->foreignIdFor(Order::class);
            $productForeign = $table->foreignIdFor(Product::class);
            $userForeign = $table->foreignIdFor(User::class);

            $table->primary([$orderForeign->name, $productForeign->name, $userForeign->name]);
            $orderForeign->constrained();
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
        Schema::dropIfExists('order_product');
    }
};
