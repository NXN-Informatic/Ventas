<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFbpageidcolumnToPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->string('fbpageid',16)->nullable();
            $table->string('mensajefb',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->dropColumn('fbpageid');
            $table->dropColumn('mensajefb');
        });
    }
}
