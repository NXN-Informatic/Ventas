<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnstoCentroscomercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centroscomerciales', function (Blueprint $table) {
            $table->string('imagen1',200)->nullable();
            $table->string('imagen2',200)->nullable();
            $table->string('descripcion',500)->nullable();
            $table->integer('cantidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centroscomerciales', function (Blueprint $table) {
            $table->dropColumn('imagen1');
            $table->dropColumn('imagen2');
            $table->dropColumn('descripcion');
            $table->dropColumn('cantidad');
        });
    }
}
