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
        Schema::create('bookings', function (Blueprint $t) {
            $t->id();
            $t->foreignId('customer_id')->nullable()->constrained();
            $t->enum('event_type', ['wedding','birthday','corporate','other']);
            $t->date('event_date');
            $t->string('event_location');
            $t->foreignId('package_id')->constrained();
            $t->enum('status', ['pending','confirmed','completed'])->default('pending')->index();
            $t->text('admin_notes')->nullable();
            $t->timestamps();
            $t->index('event_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
