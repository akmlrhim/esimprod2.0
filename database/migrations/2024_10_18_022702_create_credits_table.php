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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('project_leader');
            $table->string('system_analyst');
            $table->string('frontend_developer');
            $table->string('backend_developer');
            $table->string('uiux_designer');
            $table->string('administrator_contact');
            $table->string('guidebook')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
