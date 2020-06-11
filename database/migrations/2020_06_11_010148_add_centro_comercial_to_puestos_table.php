<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCentroComercialToPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->integer('personalizado')->default(0);
            $table->unsignedInteger('cencom_id')->nullable();
            $table->integer('cencomvalidado')->default(0);
            $table->foreign('cencom_id')->references('id')->on('centroscomerciales')->default(1);
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
            $table->dropColumn('personalizado');
            $table->dropColumn('cencom_id');
            $table->dropColumn('cencomvalidado');
        });
    }
}
