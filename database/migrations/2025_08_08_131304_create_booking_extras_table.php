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
        Schema::create('booking_extras', function (Blueprint $t) {
            $t->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $t->foreignId('extra_id')->constrained()->cascadeOnDelete();
            $t->smallInteger('quantity')->default(1);
            $t->decimal('price', 10, 2); // snapshot at booking time
            $t->primary(['booking_id','extra_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_extras');
    }
};
