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
        Schema::table('adhesions', function (Blueprint $table) {
            $table->enum("role", ["member", "owner"])
                    ->default("member")
                    ->after("colocation_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adhesions', function (Blueprint $table) {
            $table->dropColumn("role");
        });
    }
};
