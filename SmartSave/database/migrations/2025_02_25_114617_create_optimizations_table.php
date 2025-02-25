<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up()
    {
        Schema::create('optimizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('method', ['règles personnalisées', '50/30/20']);
            $table->json('suggested_budget');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('optimizations');
    }
};

