<?php

use App\Models\IndustryType;
use App\Models\OrganizationType;
use App\Models\TeamSize;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->foreignIdFor(IndustryType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(OrganizationType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(TeamSize::class)->nullable()->constrained()->nullOnDelete();
            $table->date('establishemnt_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('bio')->nullable();
            $table->text('vision')->nullable();
            $table->integer('total_views')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('map_link')->nullable();
            $table->boolean('is_profile_verified')->default(0);
            $table->timestamp('document_verified_at')->nullable();
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
        Schema::dropIfExists('companies');
    }
};