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
        Schema::create('item_receiver', function (Blueprint $table) {
            $table->id();
            $table->string('item_barcode');
            $table->string('item_name');
            $table->string('item_brand');
            $table->string('receiver_ic');
            $table->string('receiver_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_receiver');
    }
};
