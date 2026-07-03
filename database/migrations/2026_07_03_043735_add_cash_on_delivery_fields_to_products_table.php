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
            $table->boolean('cash_on_delivery')->default(1)->after('no_sale_price');
            $table->text('cod_unavailable_message')->nullable()->after('cash_on_delivery');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['cash_on_delivery', 'cod_unavailable_message']);
        });
    }
};
