<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
        {
            Schema::table('proizvods', function (Blueprint $table) {
                $table->string('tip')->nullable();  // Dodajemo kolonu 'tip' koja može biti NULL
            });
        }

        public function down()
        {
            Schema::table('proizvods', function (Blueprint $table) {
                $table->dropColumn('tip');  // Ako se migracija poništi, brišemo kolonu
            });
        }

};
