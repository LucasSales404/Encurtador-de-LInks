<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shortened_link_id')->constrained('shortened_links')->onDelete('cascade');
            $table->timestamp('clicked_at')->useCurrent();
            $table->string('ip_address', 45); 
            $table->text('user_agent')->nullable();  
            $table->text('referrer')->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clicks');
    }
};
