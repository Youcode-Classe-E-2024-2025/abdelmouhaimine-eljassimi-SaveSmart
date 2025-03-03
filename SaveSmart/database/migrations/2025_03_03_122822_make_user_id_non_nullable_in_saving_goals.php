<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('saving_goals', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Make the user_id non-nullable
        });
    }

    public function down()
    {
        Schema::table('saving_goals', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Make the user_id nullable again
        });
    }
};
