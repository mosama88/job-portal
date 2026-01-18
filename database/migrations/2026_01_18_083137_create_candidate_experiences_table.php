<?php

use App\Models\Candidate;
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
        Schema::create('candidate_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Candidate::class)->nullable()->constrained()->nullOnDelete();
            $table->string('company');
            $table->string('department');
            $table->string('designation');
            $table->date('start');
            $table->date('end');
            $table->text('responsibilities')->nullable();
            $table->boolean('currently_working')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_experiences');
    }
};