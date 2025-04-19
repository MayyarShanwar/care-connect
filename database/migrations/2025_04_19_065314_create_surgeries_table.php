<?php

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
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
        Schema::create('surgeries', function (Blueprint $table) {
            $table->id();
            $table->string('operation_name');
            $table->foreignIdFor(Patient::class);
            $table->foreignIdFor(Doctor::class);
            $table->foreignIdFor(Room::class);
            $table->string('duration');
            $table->string('schedule_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgeries');
    }
};
