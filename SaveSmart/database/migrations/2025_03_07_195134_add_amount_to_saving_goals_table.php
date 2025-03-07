<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('saving_goals', function (Blueprint $table) {
            $table->decimal('amount', 10, 2); // Adjust the precision and scale as needed
        });
    }

    public function down()
    {
        Schema::table('saving_goals', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }

};
