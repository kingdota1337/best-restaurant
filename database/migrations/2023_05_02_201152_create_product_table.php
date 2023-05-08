<?php

use App\Models\References\Type;
use App\Models\References\SubType;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Type::class)->constrained();
            $table->foreignIdFor(SubType::class)->constrained();
            $table->unsignedDouble('sugar', 8, 2)->nullable();
            $table->unsignedDouble('calories', 8, 2)->nullable();
            $table->string('color', 125)->nullable();
            $table->unsignedDouble('gasification', 8, 2)->nullable();
            $table->unsignedInteger('multiplicity');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
