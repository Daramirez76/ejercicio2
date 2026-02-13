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
        if (Schema::hasTable('songs') && Schema::hasColumn('songs', 'duration')) {
            Schema::table('songs', function (Blueprint $table) {
                $table->dropColumn('duration');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('songs') && ! Schema::hasColumn('songs', 'duration')) {
            Schema::table('songs', function (Blueprint $table) {
                $table->decimal('duration', 8, 2)->nullable();
            });
        }
    }
};
