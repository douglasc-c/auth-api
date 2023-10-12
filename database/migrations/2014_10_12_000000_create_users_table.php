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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->decimal('code', 8, 5)->unique();
            $table->enum('type', ['PF', ' PJ'])->default('PF');
            $table->string('document');
            $table->string('social_reason')->nullable();
            $table->decimal('company', 8, 5)->nullable();
            $table->foreign('company')->references('code')->on('companies')->nullOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
