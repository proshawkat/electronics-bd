<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_clearance_outlet')->default(false)->after('discount_percent');
            $table->boolean('no_sale_price')->default(false)->after('is_clearance_outlet');
            $table->decimal('sale_price', 10, 2)->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['is_clearance_outlet', 'no_sale_price']);
            $table->decimal('sale_price', 10, 2)->change();
        });
    }
};
