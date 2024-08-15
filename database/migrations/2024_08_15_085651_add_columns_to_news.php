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
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('description', 'content');
            $table->date('date')->nullable()->after('content');
            $table->time('time')->nullable()->after('date');
            $table->string('location')->nullable()->after('time');
            $table->string('source')->nullable()->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('content', 'description');
            $table->dropColumn(['date', 'time', 'location', 'source']);
        });
    }
};
