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
        Schema::create('adhesions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")
                    ->constrained("users")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId("colocation_id")
                    ->constrained("colocations")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->dateTime("left_at")->nullable();
            $table->timestamps();
            $table->unique(["colocation_id", "user_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adhesions');
    }
};
