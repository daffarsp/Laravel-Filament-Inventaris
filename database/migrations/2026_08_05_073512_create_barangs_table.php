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
Schema::create('barangs', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
    $table->string('name');
    $table->foreignId('category_id')->constrained()->cascadeOnDelete();
    $table->string('unit')->default('pcs'); // satuan: pcs, box, kg, dll
    $table->decimal('purchase_price', 15, 2)->default(0);
    $table->decimal('selling_price', 15, 2)->default(0);
    $table->integer('stock')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
