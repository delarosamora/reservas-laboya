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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id')->constrained('shifts', 'id');
            $table->foreignId('member_id')->nullable()->constrained('members', 'id');
            $table->foreignId('status_id')->nullable()->constrained('booking_statuses', 'id');
            $table->date('date');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('code', 8)->unique();
            $table->integer('member_number');
            $table->integer('number_of_guests');
            $table->mediumText('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
