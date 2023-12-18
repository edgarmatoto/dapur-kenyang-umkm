<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontak', function (Blueprint $table) {
            Schema::table('kontak', function (Blueprint $table) {
                $table->string('alamat_jalan', 255)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontak', function (Blueprint $table) {
            Schema::table('kontak', function (Blueprint $table) {
                $table->dropColumn('alamat_jalan');
            });
        });
    }
};
