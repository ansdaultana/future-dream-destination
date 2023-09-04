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
        Schema::create('other_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('message');
            $table->string('phone');
            $table->string('slug');
            $table->string('about');
            $table->boolean('responded')->default(false);
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_requests');
    }
};
