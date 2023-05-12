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
        Schema::create('users_files', function (Blueprint $table) {
            $table->id();
            $table->char('fileid');
            $table->string('ownerid');
            $table->char('name', 250);
            $table->longText('content');
            $table->char('extension', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_files');
    }
};