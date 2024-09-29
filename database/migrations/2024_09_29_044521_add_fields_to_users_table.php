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
        Schema::table('users', function (Blueprint $table) {
            $table->string("surname")->after("name");
            $table->string("father_name")->after("surname");
            $table->string("username")->after("id");
            $table->string("fin")->nullable();
            $table->string("serie")->nullable();
            $table->string("id_number")->nullable();
            $table->string("phone")->nullable();
            $table->tinyInteger("status")->default(0)->before("created_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("father_name");
            $table->dropColumn("surname");
            $table->dropColumn("username");
            $table->dropColumn("status");
        });
    }
};
