<?php

use App\Models\Profession;
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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->foreignId('experience_id')->nullable();
            $table->foreignIdFor(Profession::class)->nullable()->constrained()->nullOnDelete();
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('slug')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('website')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->enum('marital_status', ['married', 'single'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->text('cv')->nullable();
            $table->text('bio')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->enum('status', ['available', 'not_available'])->nullable();
            $table->boolean('profile_completion')->default(0);
            $table->boolean('visibility')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
