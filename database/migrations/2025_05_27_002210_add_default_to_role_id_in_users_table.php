<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ako želite podrazumevanu vrednost:
            $table->foreignId('role_id')->default(3)->change(); // Koristite ->change()
            // Ako želite da bude nullable:
            // $table->foreignId('role_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Za rollback, uklonite default ili nullable
            // $table->foreignId('role_id')->nullable(false)->change(); // Vratite na NOT NULL
            // $table->foreignId('role_id')->default(null)->change(); // Uklonite default
        });
    }
};
